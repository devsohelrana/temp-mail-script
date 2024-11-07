<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mail Accounts') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-gray-50 text-gray-800 px-20 py-10">
                    <div class="alert alert-success">
                        {{ session()->get('status') ?: '' }}
                    </div>


                    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <div class="w-56 relative text-gray-700 dark:text-gray-300">
                            <form action="">
                                <input name="keyword" type="text" class="form-control w-56 box pr-10 placeholder-theme-13" placeholder="Search..." value="{{ $keyword }}">
                                <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-600 transition ease-in-out duration-150">
                                    Search
                                </button>
                            </form>
                        </div>
                    </div>

                    <table class="table-auto">
                        <thead>
                          <tr class="text-left">
                            <th class="border px-4 py-2">#</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Recovery Mail</th>
                            <th class="border px-4 py-2">Created</th>
                            <th class="border px-4 py-2">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse($mails as $mail)
                          <tr class="text-left">
                            <td class="border px-4 py-2">{{ $mail->id }}</td>
                            <td class="border px-4 py-2">{{ $mail->email }}</td>
                            <td class="border px-4 py-2">{{ $mail->recoveryMail }}</td>
                            <td class="border px-4 py-2">{{ $mail->created_at->toDayDateTimeString() }}</td>
                            <td class="border px-4 py-2">


                                <div class="flex text-white">
                                    <a href="{{ route('mail.edit',$mail) }}" class="cursor-pointer px-5 py-4 bg-blue-700 rounded-l-md "><i class="fas fa-edit"></i></a>
                                    <a target="_blank" href="{{ route('mail.login',$mail->email) }}" class="cursor-pointer px-5 py-4 bg-green-600 rounded-r-md"><i class="fas fa-sign-in-alt"></i> Login </a>
                                    {{-- <a class="cursor-pointer px-5 py-4 bg-red-700 rounded-r-md" href="" onclick="if(confirm('Are you sure to delete this?'))event.preventDefault(); document.getElementById('delete-{{$mail->id}}').submit();"><i class="fas fa-trash-alt"></i></a> --}}
                                    {{-- <form id="delete-{{$mail->id}}" method="post" action="{{route('user.destroy',$mail->id)}}" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form> --}}
                                </div>
                                
                            </td>
                          </tr>
                          @empty
                            <span>No users!</span>
                          @endforelse
                        </tbody>
                      </table>
                      <div class="mt-6">
                        {{ $mails->withQueryString()->links() }}
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>