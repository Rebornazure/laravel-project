<x-admin.layout>
    <section class="p-3 sm:p-5">
        <div class="mx-auto max-w-xl rounded-lg bg-white p-6 shadow dark:bg-gray-800">
            <h1 class="mb-6 text-2xl font-bold text-gray-900 dark:text-white">Edit Data Siswa</h1>

            @if ($errors->any())
                <div class="mb-4 rounded-lg bg-red-100 p-4 text-sm text-red-700" role="alert">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('admin.students.update', $student->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Siswa</label>
                    <input id="name" name="name" value="{{ old('name', $student->name) }}" maxlength="100" required
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 dark:bg-gray-700 dark:text-white">
                </div>

                <div>
                    <label for="nis" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">NIS</label>
                    <input id="nis" name="nis" value="{{ old('nis', $student->nis) }}" maxlength="10" required
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 dark:bg-gray-700 dark:text-white">
                </div>

                <div>
                    <label for="classroom_id" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                    <select id="classroom_id" name="classroom_id" required
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 dark:bg-gray-700 dark:text-white">
                        @foreach ($classrooms as $classroom)
                            <option value="{{ $classroom->id }}" @selected(old('classroom_id', $student->classroom_id) == $classroom->id)>
                                {{ $classroom->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="address" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <textarea id="address" name="address" rows="3" required
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 dark:bg-gray-700 dark:text-white">{{ old('address', $student->address) }}</textarea>
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="rounded-lg bg-blue-600 px-5 py-2.5 text-white hover:bg-blue-700">Simpan Perubahan</button>
                    <a href="{{ route('admin.students.index') }}" class="rounded-lg border border-gray-300 px-5 py-2.5 text-gray-700 dark:text-gray-200">Batal</a>
                </div>
            </form>
        </div>
    </section>
</x-admin.layout>
