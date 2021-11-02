<div>
    <input type="file" name="file" wire:model="file" id="">
    <button wire:click.prevent="save">Save</button>
    @error('file')
        <div class="error">{{ $message }}</div>
    @enderror
</div>
