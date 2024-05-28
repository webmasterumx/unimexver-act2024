<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-lg modal-xl">
        <div class="modal-content bg-transparent border-0"> <!--  -->
            <div class="modal-header border-0" style="justify-content: flex-end !important">
                {{--  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> --}}
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 text-center">
                        <button id="closeModalCalculadora" type="button"
                            style="color: #de951b;"
                            class="fs-1" data-bs-dismiss="modal" aria-label="Close">
                            <i class="bi bi-x-circle-fill"></i>
                        </button>
                        <a href="{{ route('calcula_tu_cuota') }}" target="_blank">
                            <img class="img-fluid" src="{{ asset('assets/img/popup/pop_up_unimex_texto.png') }}"
                                alt="">
                        </a>
                    </div>
                </div>

            </div>
            {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
        </div>
    </div>
</div>
