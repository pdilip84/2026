<div class="mb-4">
    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name', $member->name ?? '') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" minlength="3" maxlength="20" placeholder="Removing required to check serverside errors">
    @error('name')
        <p class="text-red text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
    <input type="email" name="email" id="email" value="{{ old('email', $member->email ?? '') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required minlength="5" maxlength="50">
    @error('email')
        <p class="text-red text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
    <input type="text" name="phone" id="phone" value="{{ old('phone', $member->phone ?? '') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required minlength="5" maxlength="30" required>
    @error('phone')
        <p class="text-red text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
    <select name="status" id="status" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
        <option value="">Select Status</option>
        <option value="active" {{ old('status', $member->status ?? '') === 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ old('status', $member->status ?? '') === 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
<div class="mb-4">
    <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
    <textarea name="note" id="note" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">{{ old('note', $member->note ?? '') }}</textarea>
</div>
<div class="flex items-center justify-end">
    <a href="{{ route('members.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Cancel</a>
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-red uppercase tracking-widest hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Submit</button>
</div>
