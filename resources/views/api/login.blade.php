<x-layout>
  <div class="container">
    <div class="flex justify-center items-center h-screen w-full">
      <div class="w-full max-w-md">

        <h1 class="text-center text-2xl font-bold mb-6">This is an API only endpoint</h1>
        <div class="p-4 rounded-lg bg-gray-800 w-lg">
          <p class="mb-4 text-gray-300">
            This endpoint is intended for testing purposes only. No login form for simplicity. Please use the <a
              href=" {{ route('generate-token') }}" class="text-blue-500">generate-token</a> endpoint to
            generate a
            token. {{ 'Then use it in the Authorization header as \'Bearer <token>\'.' }}
          </p>
        </div>

      </div>
    </div>
  </div>
</x-layout>