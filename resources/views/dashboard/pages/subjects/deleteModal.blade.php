
<button type="button" class="  btn btn-secondary btn-hover" data-bs-toggle="modal" data-bs-target="#ModalFour{{ $value->id }}">
                      Delete
                    </button>



<div class="warning-modal  " >
    <div class="modal fade"  tabindex="-1" aria-hidden="true" id="ModalFour{{ $value->id }}">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card-style">
          <div class="modal-header px-0 border-0">
            <h5 class="text-bold">
              <i class="lni lni-warning text-danger me-2"></i> Warning
            </h5>
          </div>
          <div class="modal-body px-0">
            <div class="content mb-30">
              <p class="text-sm">

                Are You Sure Do You Want To Delete {{$value->name}} This Will Cause All
                Data Related To This Year To Be Deleted As Well
              </p>
            </div>
            <div class="action d-flex flex-wrap justify-content-end">
              <button data-bs-dismiss="modal" class="main-btn btn-sm primary-btn-outline btn-hover m-1">
                Cancel
              </button>

              <form action="{{route('subject.destroy' , $value['id'] )}}" method="post" >
                            @csrf
                            @method('delete')
              <button data-bs-dismiss="modal" class="main-btn btn-sm danger-btn-outline btn-hover m-1">
                Delete
              </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
