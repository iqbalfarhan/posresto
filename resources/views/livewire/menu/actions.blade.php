<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="font-bold text-lg">Form input menu</h3>
            <div class="py-4 space-y-2">
                <div class="flex justify-center">
                    <label for="pickphoto" class="avatar">
                        <div class="w-32 rounded-xl">
                            <img src="{{ $photo ? $photo->temporaryUrl() : url('noimages.png') }}" />
                        </div>
                    </label>
                </div>
                <input type="file" class="hidden" id="pickphoto" wire:model="photo">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama menu</span>
                    </div>
                    <input type="text" placeholder="Type here" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.name'),
                    ]) wire:model="form.name" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Harga menu</span>
                    </div>
                    <input type="number" placeholder="Type here" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.price'),
                    ])
                        wire:model="form.price" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Tipe menu</span>
                    </div>
                    <select @class([
                        'select select-bordered',
                        'select-error' => $errors->first('form.type'),
                    ]) wire:model="form.type">
                        <option value=""></option>
                        @foreach ($types as $tipe)
                            <option value="{{ $tipe }}">{{ $tipe }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Keterangan</span>
                    </div>
                    <textarea placeholder="Tulis keterangan menu disini" @class([
                        'textarea textarea-bordered',
                        'input-error' => $errors->first('form.desc'),
                    ]) wire:model="form.desc"></textarea>
                </label>
            </div>
            <div class="modal-action justify-between">
                <button type="button" class="btn btn-ghost" wire:click="closeModal">Close</button>
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>
