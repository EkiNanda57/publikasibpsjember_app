<form method="POST" action="{{ route('password.reset.process', $username) }}" class="space-y-5">
    @csrf

    <label class="block text-sm font-medium">Password Baru</label>
    <input type="password" name="password" class="w-full px-4 py-3 border rounded-xl">

    <button type="submit" class="w-full py-3 text-orange-400 border border-orange-400 rounded-xl hover:bg-orange-400 hover:text-white">
        Simpan Password
    </button>
</form>
