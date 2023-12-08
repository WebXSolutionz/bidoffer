<?php

namespace App\Http\Controllers;

use App\Models\AirConditioningType;
use App\Models\Appliance;
use App\Models\Bathroom;
use App\Models\Bedroom;
use App\Models\City;
use App\Models\County;
use App\Models\FeeInclude;
use App\Models\Financing;
use App\Models\HeatingFuel;
use App\Models\PropertyAuction;
use App\Models\PropertyAuctionAcType;
use App\Models\PropertyAuctionAppliance;
use App\Models\PropertyAuctionFeeInclude;
use App\Models\PropertyAuctionFinancing;
use App\Models\PropertyAuctionFuel;
use App\Models\PropertyAuctionMedia;
use App\Models\PropertyAuctionPropertyType;
use App\Models\PropertyAuctionTerm;
use App\Models\PropertyAuctionWaterExtra;
use App\Models\PropertyAuctionWaterViewType;
use App\Models\PropertyType;
use App\Models\State;
use App\Models\WaterExtra;
use App\Models\WaterViewType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PropertyAuctionController extends Controller
{
    public function addListing(Request $request)
    {
        $page_data['title'] = 'Add Property Listing';
        $page_data['cities'] = City::where('state_id','3930')->get();
        $page_data['states'] = State::where('country_id','231')->where('id','3930')->get();
        $page_data['bedrooms'] = Bedroom::all();
        $page_data['bathrooms'] = Bathroom::all();
        $page_data['financings'] = Financing::all();
        $page_data['property_types'] = PropertyType::all();
        $page_data['counties'] = County::all();
        $page_data['ac_types'] = AirConditioningType::all();
        $page_data['heating_fuel'] = HeatingFuel::all();
        $page_data['water_views'] = WaterViewType::all();
        $page_data['water_extras'] = WaterExtra::all();
        $page_data['appliances'] = Appliance::all();
        $page_data['fee_includes'] = FeeInclude::all();
        $page_data['id'] = $id = $request->id ?? -1;
        $page_data['auction'] = $auction = PropertyAuction::whereId($id)->first();
        // dd($auction->ac_types->pluck('id')->toArray());
        // dd($auction->ac_types->toArray());
        $page_data['step'] = $request->step ?? $auction->step ?? 1;
        return view('add_listing',$page_data);
    }

    public function step1(Request $request)
    {
        $request->validate([
            'address' => ['required'],
            'city_id' => ['required'],
            'state_id' => ['required'],
        ]);
        if($request->id>0)
        {
            $auction = PropertyAuction::whereId($request->id)->first();
        }
        else
        {
            $auction = new PropertyAuction();
        }
        $auction->user_id = Auth::user()->id;
        $auction->title = $request->address;
        $auction->address = $request->address;
        $auction->city_id = $request->city_id;
        $auction->state_id = $request->state_id;
        $auction->step = 2;
        $auction->save();
        // dd($request->input());
        return redirect()->to(route('add-listing').'?step=2&id='.$auction->id);
    }

    public function step2(Request $request)
    {
        $request->validate([
            'description' => ['required'],
            'keywords' => ['required'],
            'bedroom_id' => ['required'],
            'bathroom_id' => ['required'],
        ],[
            'description.required' => "Please add description!",
            'keywords.required' => "Please add Keywords!",
            'bedroom_id.required' => "Please select number of bedrooms!",
            'bathroom_id.required' => "Please select number of bathrooms!",
        ]);
        $auction = PropertyAuction::whereId($request->id)->first();
        $auction->description = $request->description;
        $auction->keywords = $request->keywords;
        $auction->bedroom_id = $request->bedroom_id;
        $auction->bathroom_id = $request->bathroom_id;
        $auction->step = 3;
        $auction->save();
        return redirect()->to(route('add-listing').'?step=3&id='.$auction->id);
    }

    public function step3(Request $request)
    {
        $request->validate([
            'autcion_type'=>['required'],
            'auction_length' => ['required'],
            'starting_price' => ['required'],
            'property_type_id' => ['required'],
        ],[
            'autcion_type.required' => 'Please select Auction Type!',
            'auction_length.required' => 'Please select Auction Length!',
            'starting_price.required' => 'Please enter Starting Price!',
            'property_type_id.required' => 'Please select Type of Property!',
        ]);
        $auction = PropertyAuction::whereId($request->id)->first();
        $auction->autcion_type = $request->autcion_type;
        $auction->auction_length = $request->auction_length;
        $auction->starting_price = $request->starting_price;
        $auction->buy_now_price = $request->buy_now_price;
        $auction->reserve_price = $request->reserve_price;
        $auction->heated_sqft = $request->heated_sqft;
        $auction->year_built = $request->year_built;
        $auction->county_id = $request->county_id;
        $auction->pool = $request->pool;
        $auction->carport = $request->carport;
        $auction->garage = $request->garage;
        $auction->garage_spaces = $request->garage_spaces;
        $auction->water_view = $request->water_view;
        $auction->water_extras = $request->water_extras;
        $auction->hoa_association = $request->hoa_association;
        $auction->hoa_manager_contact = $request->hoa_manager_contact;
        $auction->hoa_fee_requirement = $request->hoa_fee_requirement;
        $auction->hoa_fee = $request->hoa_fee;
        $auction->hoa_payment_schedule = $request->hoa_payment_schedule;
        $auction->condo_fee = $request->condo_fee;
        $auction->condo_fee_schedule = $request->condo_fee_schedule;
        $auction->old_community = $request->old_community;
        $auction->rental_restrictions = $request->rental_restrictions;
        $auction->rental_restrictions_desription = $request->rental_restrictions_desription;
        $auction->pets_allowed = $request->pets_allowed;
        $auction->number_of_pets_allowed = $request->number_of_pets_allowed;
        $auction->max_pet_weight = $request->max_pet_weight;
        $auction->pet_restrictions = $request->pet_restrictions;
        $auction->mls_id = $request->mls_id;
        $auction->is_in_flood_zone = $request->is_in_flood_zone;
        $auction->flood_zone_code = $request->flood_zone_code;
        $auction->number_of_floors_in_unit = $request->number_of_floors_in_unit;
        $auction->total_number_of_floors = $request->total_number_of_floors;
        $auction->elevator = $request->elevator;
        $auction->property_info = $request->property_info;
        $auction->number_of_buildings = $request->number_of_buildings;
        $auction->number_of_units = $request->number_of_units;
        $auction->unit_sizes = $request->unit_sizes;
        $auction->sqft_for_each_unit = $request->sqft_for_each_unit;
        $auction->occupied_vacant_info = $request->occupied_vacant_info;
        $auction->current_rental_amount = $request->current_rental_amount;
        $auction->expected_rental_amount = $request->expected_rental_amount;
        $auction->anual_gross_income = $request->anual_gross_income;
        $auction->anual_expense = $request->anual_expense;
        $auction->anual_net_income = $request->anual_net_income;
        $auction->total_monthly_rent = $request->total_monthly_rent;
        $auction->lease_terms = $request->lease_terms;
        $auction->tenant_pays = $request->tenant_pays;
        $auction->landlord_pays = $request->landlord_pays;
        $auction->seller_name = $request->seller_name;
        $auction->brokerage = $request->brokerage;
        $auction->license_number = $request->license_number;
        $auction->phone_number = $request->phone_number;
        $auction->email = $request->email;
        $auction->seller_agent_mls_id = $request->seller_agent_mls_id;
        $auction->looking_another_property = $request->looking_another_property;
        $auction->step = 4;
        $auction->save();

        $pat = PropertyAuctionTerm::where('property_auction_id', $auction->id)->first();
        $pat = $pat ?? new PropertyAuctionTerm();
        $pat->property_auction_id = $auction->id;
        $pat->escrow_amount = $request->escrow_amount;
        $pat->inspection_perion = $request->inspection_perion;
        $pat->buyer_agent_commission = $request->buyer_agent_commission;
        $pat->buyer_premium = $request->buyer_premium;
        $pat->seller_premium = $request->seller_premium;
        $pat->success_fee_to_be_paid_by = $request->success_fee_to_be_paid_by;
        $pat->additional_remarks = $request->additional_remarks;
        $pat->property_list_date = $request->property_list_date;
        $pat->save();


        // $auction->property_type_id = $request->property_type_id;

        PropertyAuctionPropertyType::where('property_auction_id',$auction->id)->delete();
        if($request->property_type_id)
        {
            $papt = new PropertyAuctionPropertyType();
            $papt->property_auction_id = $auction->id;
            $papt->property_type_id = $request->property_type_id;
            $papt->save();
        }

        PropertyAuctionFinancing::where('property_auction_id',$auction->id)->delete();
        foreach($request->financing_ids as $financing_id)
        {
            $paf = new PropertyAuctionFinancing();
            $paf->property_auction_id = $auction->id;
            $paf->financing_id = $financing_id;
            $paf->save();
        }
        PropertyAuctionAcType::where('property_auction_id',$auction->id)->delete();
        foreach($request->ac_type_id as $ac_type_id)
        {
            $paat = new PropertyAuctionAcType();
            $paat->property_auction_id = $auction->id;
            $paat->air_conditioning_type_id = $ac_type_id;
            $paat->save();
        }
        PropertyAuctionFuel::where('property_auction_id',$auction->id)->delete();
        foreach($request->fuel_id as $fuel_id)
        {
            $paFuel = new PropertyAuctionFuel();
            $paFuel->property_auction_id = $auction->id;
            $paFuel->heating_fuel_id = $fuel_id;
            $paFuel->save();
        }
        PropertyAuctionWaterViewType::where('property_auction_id',$auction->id)->delete();
        foreach($request->water_view_id as $water_view_id)
        {
            $pawvt = new PropertyAuctionWaterViewType();
            $pawvt->property_auction_id = $auction->id;
            $pawvt->water_view_type_id = $water_view_id;
            $pawvt->save();
        }
        PropertyAuctionWaterExtra::where('property_auction_id',$auction->id)->delete();
        foreach($request->water_extra_id as $water_extra_id)
        {
            $pawe = new PropertyAuctionWaterExtra();
            $pawe->property_auction_id = $auction->id;
            $pawe->water_extra_id = $water_extra_id;
            $pawe->save();
        }
        PropertyAuctionAppliance::where('property_auction_id',$auction->id)->delete();
        foreach($request->appliance_id as $appliance_id)
        {
            $paa = new PropertyAuctionAppliance();
            $paa->property_auction_id = $auction->id;
            $paa->appliance_id = $appliance_id;
            $paa->save();
        }
        PropertyAuctionFeeInclude::where('property_auction_id',$auction->id)->delete();
        foreach($request->fee_includes as $fee_include_id)
        {
            $pafi = new PropertyAuctionFeeInclude();
            $pafi->property_auction_id = $auction->id;
            $pafi->fee_include_id = $fee_include_id;
            $pafi->save();
        }
        return redirect()->to(route('add-listing').'?step=4&id='.$auction->id);
    }

    public function step4(Request $request)
    {
        $allowedPhotos=['jpg','png','jpeg','gif','svg'];
        $allowedVideos=['mp4','mov','wmv','avi','mkv','mpeg-2'];
        $allowedAudios=['mp3','wav','voc','ogg','oga','cda','ogv'];
        $id = $request->id;
        // $photos = $request->file('photos');
        if($request->hasFile('photos'))
        {
            foreach($request->file('photos') as $photo) {
                $originalName = $photo->getClientOriginalName();
                $extension = $photo->getClientOriginalExtension();
                $imageSize = $photo->getSize();
                // $size = number_format($imageSize / 1048576,2);
                $check=in_array($extension,$allowedPhotos);
                if($check)
                {
                    $uuid = (string) Str::uuid();
                    $imageName = $uuid.'.'.$extension;
                    $photo->move(public_path('auction/images'), $imageName);
                    $pam = new PropertyAuctionMedia();
                    $pam->property_auction_id = $id;
                    $pam->media_type = 'image';
                    $pam->original_name = $originalName;
                    $pam->name = $imageName;
                    $pam->size = $imageSize;
                    $pam->save();
                }
            }
        }

        // $videos = $request->file('videos');
        if($request->hasFile('videos'))
        {
            foreach($request->videos as $video) {
                $originalName = $video->getClientOriginalName();
                $extension = $video->getClientOriginalExtension();
                $videoSize = $video->getSize();
                // $size = number_format($videoSize / 1048576,2);
                $check=in_array($extension,$allowedVideos);
                if($check)
                {
                    $uuid = (string) Str::uuid();
                    $videoName = $uuid.'.'.$extension;
                    $video->move(public_path('auction/videos'), $videoName);
                    $pam = new PropertyAuctionMedia();
                    $pam->property_auction_id = $id;
                    $pam->media_type = 'video';
                    $pam->original_name = $originalName;
                    $pam->name = $videoName;
                    $pam->size = $videoSize;
                    $pam->save();
                }
            }
        }

        // $audios = $request->file('audios');
        if($request->hasFile('audios'))
        {
            foreach($request->audios as $audio) {
                $originalName = $audio->getClientOriginalName();
                $extension = $audio->getClientOriginalExtension();
                $audioSize = $audio->getSize();
                // $size = number_format($audioSize / 1048576,2);
                $check=in_array($extension,$allowedAudios);
                if($check)
                {
                    $uuid = (string) Str::uuid();
                    $audioName = $uuid.'.'.$extension;
                    $audio->move(public_path('auction/audios'), $audioName);
                    $pam = new PropertyAuctionMedia();
                    $pam->property_auction_id = $id;
                    $pam->media_type = 'audio';
                    $pam->original_name = $originalName;
                    $pam->name = $audioName;
                    $pam->size = $audioSize;
                    $pam->save();
                }
            }
        }

        $auction = PropertyAuction::whereId($id)->first();
        $auction->step = 5;
        $auction->save();

        return redirect()->to(route('add-listing').'?step=5&id='.$id);

    }

    public function step5(Request $request)
    {
        $id = $request->id;
        $auction = PropertyAuction::whereId($id)->first();
        $auction->step = -1;
        $auction->save();
        return redirect()->to(route('author'));
    }

    public function viewPropertyListing($id, Request $request)
    {
        $page_data['auction'] = PropertyAuction::whereId($id)->first();
        $page_data['financings'] = Financing::all();
        // dd($page_data['financings']->toArray());
        $page_data['title'] = $page_data['auction']->address;
        return view('property_detail', $page_data);
    }

    public function searchListing()
    {
        $page_data['title'] = 'Search Listings';
        $page_data['count'] = PropertyAuction::where('user_id', Auth::user()->id)->count();
        // dd($page_data['count']);
        $page_data['pAuctions'] = PropertyAuction::where('user_id', Auth::user()->id)->paginate(8);
        return view('pAuctionListing',$page_data);
    }
}
