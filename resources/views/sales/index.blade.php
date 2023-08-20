<x-app-layout>
    
    <div class="py-12">
      
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        
        @if (session('status'))
          <span class="text-green-600">{{ session('status') }}</span>
        @endif
  
        
        <div class="px-4 sm:px-6 lg:px-8">
          
          <x-heading
            title="Sales"
            description="A list of all the sales." />
        
          <div class="w-full overflow-hidden md:rounded-lg">
            <livewire:table
              resource="Sale"
              :columns="[
                ['label' => 'Seller', 'column' => 'seller.user.name'],
                ['label' => 'Client', 'column' => 'client.user.name'],
                ['label' => 'Sold at', 'column' => 'sold_at'],
                ['label' => 'Status', 'column' => 'status'],
                ['label' => 'Total Amount', 'column' => 'total_amount'],
              ]" />
          </div>
            
        </div>
      </div>
    </div>
  
  </x-app-layout>