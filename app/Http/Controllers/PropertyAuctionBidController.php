<?php

namespace App\Http\Controllers;

use App\Models\PropertyAuction;
use App\Models\PropertyAuctionBid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PropertyAuctionBidController extends Controller
{
    public function savePABid(Request $request)
    {
        // $request->validate([]);
        $allowedFiles=['jpg','png','jpeg','gif','svg','csv','txt','xlx','xls','pdf','doc','docs','docm','docx','dot','dotm','dotx','odt','rtf','wps','xml','xps'];//csv,txt,xlx,xls,pdf
        $allowedVideos=['mp4','mov','wmv','avi','mkv','mpeg-2'];
        $allowedAudios=['mp3','wav','voc','ogg','oga','cda','ogv'];
        $pab = new PropertyAuctionBid();
        $pab->property_auction_id = $request->auction_id;
        $pab->user_id = Auth::user()->id;
        $pab->financing_id = $request->financing_id;
        $pab->price = $request->price;
        $pab->escrow_amount = $request->escrow_amount;
        $pab->closing_date = $request->closing_date;
        $pab->inspection_period = $request->inspection_period;
        $pab->contingencies = $request->contingencies;
        if($request->video != "")
        {
            $extension = $request->video->getClientOriginalExtension();
            $check=in_array($extension,$allowedVideos);
            if($check)
            {
                $uuid = (string) Str::uuid();
                $videoName = $uuid.'.'.$extension;
                $request->video->move(public_path('auction/bid/videos'), $videoName);
                $pab->video = $videoName;
            }
        }

        if($request->audio != "")
        {
            $extension = $request->audio->getClientOriginalExtension();
            $check=in_array($extension,$allowedAudios);
            if($check)
            {
                $uuid = (string) Str::uuid();
                $audioName = $uuid.'.'.$extension;
                $request->audio->move(public_path('auction/bid/audios'), $audioName);
                $pab->audio = $audioName;
            }
        }


        if($request->letter != "")
        {
            $extension = $request->letter->getClientOriginalExtension();
            $check=in_array($extension,$allowedFiles);
            if($check)
            {
                $uuid = (string) Str::uuid();
                $letterName = $uuid.'.'.$extension;
                $request->letter->move(public_path('auction/bid/letters'), $letterName);
                $pab->letter = $letterName;
            }
        }
        if($pab->save())
        {
            return redirect()->back()->with('success','Your Bid Added Successfully!');
        } else {
            return redirect()->back()->with('error','Some Problem in adding bid!');
        }

    }

    public function acceptPABid(Request $request)
    {
        // dd($request->input());
        $pab = PropertyAuctionBid::whereId($request->bid_id)->first();
        $pab->accepted = true;
        $pab->accepted_date = date('Y-m-d H:i:s');

        $pa = PropertyAuction::whereId($request->auction_id)->first();
        $pa->sold = true;
        $pa->sold_date = date('Y-m-d H:i:s');

        if($pab->save() && $pa->save()) {
            return redirect()->back()->with('success','Bid Accepted successfully!');
        } else {
            return redirect()->back()->with('error', 'Some problem in bid acceptance!');
        }

    }
}
