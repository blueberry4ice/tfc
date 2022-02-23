<div>
    <div>
        <div>
            <div></div>
        </div>
        <div role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div>
                    <div>
                        <div>
                            <div>
                                <label for="agents">agent</label>
                                @foreach ($dataAgents as $key => $agent)
                                    <input type="checkbox" value="{{ $agent->id }}" id="checkboxagents{{ $agent->id }}" 
                                        wire:model="agents">
                                    <label for="checkboxagents{{ $agent->id }}">
                                        <span></span> {{ $agent->name }}
                                    </label>
                                @endforeach
                                @error('agents') <span class="text-red-500" style="color: red">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div>
                            <label for="name">name</label>
                            <input type="text" id="name" placeholder="Enter name" size = '50' wire:model="name">
                            @error('name') <span class="text-red-500" style="color: red">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label for="summary">summary</label>
                            <textarea id="summary" wire:model="summary" placeholder="summary" cols = '50'></textarea>
                            @error('summary') <span class="text-red-500" style="color: red">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label for="detail">spesial remark</label>
                            <textarea id="detail" wire:model="detail" placeholder="spesial remark" cols = '50'></textarea>
                            @error('detail') <span class="text-red-500" style="color: red">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label for="continent">continent</label>
                            <input type="text" id="continent" placeholder="Enter continent e.g. Asia" size = '50' wire:model="continent">
                            @error('continent') <span class="text-red-500" style="color: red">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label for="country">country</label>
                            <input type="text" id="country" placeholder="Enter country e.g. Indonesia" size = '50' wire:model="country">
                            @error('country') <span class="text-red-500" style="color: red">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label for="city">city</label>
                            <input type="text" id="city" placeholder="Enter city e.g. Jakarta, Bandung, Surabaya, Medan" size = '50' wire:model="city" >
                            @error('city') <span class="text-red-500" style="color: red">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label for="image">image</label>
                            <input type="file" wire:model="image" name="image">
                            <div wire:loading wire:target="image" class="text-sm italic text-gray-500">Uploading...
                            </div>
                            @error('image') <span class="text-red-500" style="color: red">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label for="thumbnail">thumbnail</label>
                            <input type="file" wire:model="thumbnail">
                            <div wire:loading wire:target="thumbnail" class="text-sm italic text-gray-500">Uploading...
                            </div>
                            @error('thumbnail') <span class="text-red-500" style="color: red">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label for="flyer">flyer</label>
                            <input type="file" wire:model="flyer">
                            <div wire:loading wire:target="flyer" class="text-sm italic text-gray-500">Uploading...
                            </div>
                            @error('flyer') <span class="text-red-500" style="color: red">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label for="month">month</label>
                            @foreach ($dataMonths as $key => $month)
                                <input type="checkbox" id="checkboxmonth{{ $month->id }}" value={{ $month->id }}
                                    wire:model="months">
                                <label for="checkboxmonth{{ $month->id }}">
                                    <span></span> {{ $month->name }}
                                </label>
                            @endforeach
                            @error('months') <span class="text-red-500" style="color: red">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <div><label for="price">price</label></div>
                            <div>
                                <input type="text" wire:model="pricename.0" placeholder="Enter Price Name">
                                <input type="text" wire:model="priceval.0" placeholder="Enter Price">
                                
                                @error('priceval.0') <span
                                    class="text-danger error" style="color: red">{{ $message }}</span>@enderror
                                @error('pricename.0') <span
                                    class="text-danger error" style="color: red">{{ $message }}</span>@enderror
                            </div>
                            
                                @foreach ($priceinputs as $key => $value)
                                <div>
                                    <input type="text" placeholder="Enter Price Name"
                                        wire:model="pricename.{{$key+1}}">
                                    @error('pricename' . $value) <span
                                        class="text-danger error">{{ $message }}</span>@enderror
                                    <input type="text" wire:model="priceval.{{ $key+1 }}"
                                        placeholder="Enter Price">
                                    @error('priceval' . $value) <span
                                        class="text-danger error">{{ $message }}</span>@enderror
                                    <button class="btn btn-danger btn-sm"
                                        wire:click.prevent="remove({{ $key }})">Remove Price</button>
                                    </div>
                                @endforeach
                                <button class="text-white btn btn-info btn-sm"
                                wire:click.prevent="add({{ $iprice }})">Add Price</button>
                        </div>
                        
                    </div>
                    @error('price') <span class="text-red-500" style="color: red">{{ $message }}</span>@enderror
                </div>
        </div>
    </div>
    <div>
        <button wire:click="closeModalCreate()" type="button">Cancel</button>
        <button wire:click.prevent="store()" type="button">Save</button>
    </div>
    </form>
</div>
</div>
</div>
