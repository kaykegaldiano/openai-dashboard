<x-app-layout>
    
  <div class="py-12">
    
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      
      @if (session('status'))
        <span class="text-green-600">{{ session('status') }}</span>
      @endif

      
      <div class="px-4 sm:px-6 lg:px-8">
        
        <x-heading
          title="Client"
          description="A list of all the clients."
          :btn-label="__('Create client')"
          :route="route('clients.create')" />
      
        <div class="w-full overflow-hidden md:rounded-lg">
          <livewire:table
            resource="Client"
            :columns="[
              ['label' => 'Client', 'column' => 'user.name'],
              ['label' => 'Email', 'column' => 'user.email'],
              ['label' => 'City', 'column' => 'address.city'],
              ['label' => 'Status', 'column' => 'address.state'],
            ]"
            edit="clients.edit"
            delete="clients.delete"/>
        </div>
          
      </div>
    </div>
  </div>

</x-app-layout>