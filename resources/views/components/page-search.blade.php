<section class="row">
    <div class="col-sm-12 col-md-6">
        <div class="dataTables_length" id="maintable_length">
            <label class="d-flex justify-content-start align-items-center">
                <span class="me-1">Show</span>
                <select wire:model.lazy="limit"
                    class="custom-select custom-select-sm form-control form-control-sm w-25 me-1">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span class="_col-auto">entries</span>
            </label>
        </div>
    </div>

    {{-- Search --}}
    <div class="col-sm-12 col-md-6">
        <div id="maintable_filter" class="dataTables_filter">
            <label class="d-flex justify-content-start align-items-center">
                <span class="me-1">Search:</span>
                <input type="search" class="form-control form-control-sm" placeholder="" wire:model="search">
            </label>
        </div>
    </div>
</section>
