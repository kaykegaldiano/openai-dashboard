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
      
        <div class="max-w-full overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
        
          <table class="w-full divide-y divide-gray-300">
          
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">City</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">State</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">Edit</span>
                </th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">Delete</span>
                </th>
              </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($clients as $client)
                <tr>
                  <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">{{ $client->user->name }}</td>
                  <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $client->user->email }}</td>
                  <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $client->address->city }}</td>
                  <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $client->address->state }}</td>
                  <td class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                      <a href="{{ route('clients.edit', $client) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                  </td>
                  <td class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                      delete
                  </td>
                </tr>
                @endforeach
              <!-- More people... -->
            </tbody>
          
          </table>

        </div>
        <div class="pt-4"> {{ $clients->links() }} </div>
      </div>
    </div>
  </div>

</x-app-layout>