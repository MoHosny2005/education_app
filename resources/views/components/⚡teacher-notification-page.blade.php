<?php

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
  public function markAsRead(string $id){
    $notification = Auth::guard('teach')->user()->notifications()->find($id);

    if($notification){
        $notification->markAsRead();
    }
  }


  public function deleteNotification(string $id){
    $notification = Auth::guard('teach')->user()->notifications()->find($id);

    if($notification){
        $notification->delete();
    }
  }

};
?>

<div>
    <div class="card-style">

    @forelse ( Auth::guard('teach')->user()->Notifications->sortBy([
        ['read_at' , 'asc']
    ]) as $notification )

         <div class="single-notification  ">

            <div class="notification">
              <div class="image warning-bg">
                <span>W</span>
              </div>
              <a href="#0" class="content">
             <div class="d-flex align-items-center gap-2 ">
                <h6>{{ $notification->data['details'] }}</h6>

                    @if($notification->read_at === null)
                        <p class="status-btn active-btn  ">Un Read</p>
                    @else
                        <p class="status-btn  info-btn ">Read</p>
                    @endif
             </div>
                <p class="text-sm text-gray">
                 {{ $notification->data['content'] }}
                </p>
                <span class="text-sm text-medium text-gray"> {{ $notification->created_at->diffForHumans() }} </span>
              </a>
            </div>
            <div class="action">
                @if( ! is_null($notification->read_at))
              <button class="delete-btn" wire:click="deleteNotification('{{$notification->id}}')">
                <i class="lni lni-trash-can"></i>
              </button>
              @endif
              <button  class="more-btn dropdown-toggle" id="moreAction" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="lni lni-more-alt"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreAction">
                @if(is_null($notification->read_at))
                <li class="dropdown-item">
                  <a href="#0" wire:click="markAsRead('{{$notification->id}}')" class="text-gray">Mark as Read</a>
                </li>
                @else
                <li class="dropdown-item">
                <span class="text-gray">Read</span>
                </li>
                @endif
                <li class="dropdown-item">
                  <a href="#0"  class="text-gray">Reply</a>
                </li>
              </ul>
            </div>
          </div>
    @empty
          <p class="text-gray">You Do Not Having Any Notifications Yet</p>
    @endforelse




        </div>

</div>
