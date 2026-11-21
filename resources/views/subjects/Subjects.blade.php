<x-admin.layout>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="relative overflow-hidden rounded-lg bg-white shadow-md dark:bg-gray-800">

                <div class="flex items-center justify-between p-4">
                    <div>
                        <h1 class="text-xl font-bold text-gray-900 dark:text-white">
                            Data Subjects
                        </h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Daftar mata pelajaran
                        </p>
                    </div>
                    <div>
                        @if (session('success'))<p class="mb-2 text-sm text-green-700">{{ session('success') }}</p>@endif
                        @if (session('error'))<p class="mb-2 text-sm text-red-700">{{ session('error') }}</p>@endif
                    </div>
                    <a href="{{ route('admin.subjects.create') }}" class="rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800">+ Tambah Subject</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-300">
                            <tr>
                                <th scope="col" class="px-4 py-3">No</th>
                                {{-- <th scope="col" class="px-4 py-3">ID</th> --}}
                                <th scope="col" class="px-4 py-3">Nama Mata Pelajaran</th>
                                <th scope="col" class="px-4 py-3">Teacher </th>
                                <th scope="col" class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($subjects as $subject)
                                <tr class="border-b dark:border-gray-700">
                                    {{-- <td class="px-4 py-3">
                                        {{ $loop->iteration }}
                                    </td> --}}
                                    <td class="px-4 py-3">
                                        {{ $subject->id }}
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">
                                        {{ $subject->name }}
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">
                                        {{ $subject->teacher?->name ?? 'Belum ada guru' }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST" class="inline"
                                            onsubmit="return confirm('Yakin ingin menghapus mata pelajaran ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-red-600 hover:underline">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-6 text-center">

                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4 text-sm text-gray-500 dark:text-gray-400">
                    Total mata pelajaran: {{ $subjects->count() }}
                </div>

            </div>
        </div>
    </section>
</x-admin.layout>
