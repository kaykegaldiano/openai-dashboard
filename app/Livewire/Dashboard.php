<?php

namespace App\Livewire;

use App\Models\SalesCommission;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;

class Dashboard extends Component
{
    public mixed $config;

    #[Rule('required|min:10')]
    public string $question;

    public array $dataset;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.dashboard');
    }

    public function generateReport()
    {
        $this->validate();

        $fields = implode(', ', SalesCommission::getColumns());

        $this->config = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => "Considerando a lista de campos ($fields), gere uma configuração json do Vega-Lite v5 (sem campo de dados e com descrição) que atenda o seguinte pedido {$this->question}. Resposta:",
            'max_tokens' => 1500
        ])->choices[0]->text;

        $this->config = str_replace("\n", "", $this->config);
        $this->config = json_decode($this->config, true);

        $this->dataset = ['values' => SalesCommission::inRandomOrder()->limit(100)->get()->toArray()];

        return $this->config;
    }
}
