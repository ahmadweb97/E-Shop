<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;

class WishlistShow extends Component
{

    public function removeWishlistItem(int $WishlistId)
    {

         Wishlist::where('user_id', auth()->user()->id)->where('id', $WishlistId)->delete();
         $this->emit('wishlistAdd_Update');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Wishlist item removed successfully!',
            'type' => 'success',
            'status' => 200
         ]);
        }

    public function render()
    {

        $wishList = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show', [
            'wishList' => $wishList
        ]);
    }
}
