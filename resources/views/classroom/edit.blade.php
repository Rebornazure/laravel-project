<x-admin.layout>
    <section class="p-3 sm:p-5">
        <div class="mx-auto max-w-xl rounded-lg bg-white p-6 shadow dark:bg-gray-800">
            <h1 class="mb-6 text-2xl font-bold text-gray-900 dark:text-white">Edit Data Kelas</h1>

            @if ($errors->any())
                <div class="mb-4 rounded-lg bg-red-100 p-4 text-sm text-red-700" role="alert">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('admin.classrooms.update', $classroom->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Kelas</label>
                    <input id="name" name="name" value="{{ old('name', $classroom->name) }}" maxlength="50" required
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 dark:bg-gray-700 dark:text-white">
                </div>

                <div>
                    <label for="major" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                    <input id="major" name="major" value="{{ old('major', $classroom->major) }}" maxlength="50" required
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 dark:bg-gray-700 dark:text-white">
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="rounded-lg bg-blue-600 px-5 py-2.5 text-white hover:bg-blue-700">Simpan Perubahan</button>
                    <a href="{{ route('admin.classrooms.index') }}" class="rounded-lg border border-gray-300 px-5 py-2.5 text-gray-700 dark:text-gray-200">Batal</a>
                </div>
            </form>
        </div>
    </section>
</x-admin.layout>
