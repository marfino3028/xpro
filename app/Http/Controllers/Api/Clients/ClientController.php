<?php

namespace App\Http\Controllers\Api\Clients;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ClientController extends BaseController
{
    //
    public function getClients(Request $request)
    {
        try {
            $user = $request->user();
            $page = $request->page ? (int) $request->page : 1;
            $perPage = $request->perPage ? (int) $request->perPage : 10;
            $skip = $perPage * $page - $perPage;
            $data = Client::skip($skip)->limit($perPage)->get();
            $count = Client::count();

            return response()->json([
                'success' => true,
                'count' => $count,
                'page' => $page,
                'perPage' => $perPage,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }

    public function detailClient(Request $request)
    {
        try {
            $user = $request->user();
            $client_id = $request->route('id');
            $data = Client::where('id', $client_id)->first();
            if ($data == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Client ID is not found'
                ]);
            }
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }

    public function createClient(Request $request)
    {
        try {
            $user = $request->user();
            if (!$request->logo_clients) {
                return response()->json([
                    'success' => false,
                    'message' => "Invalid parameters"
                ]);
            }
            $logo = $request->logo_clients->getClientOriginalName();
            Client::create([
                'full_name' => $request->full_name,
                'status' => $request->status,
                'business_name' => $request->business_name,
                'email' => $request->email,
                'street' => $request->street,
                'city' => $request->city,
                'province' => $request->province,
                'telephone' => $request->telephone,
                'mobile' => $request->mobile,
                'country' => $request->country,
                'status_client' => 1,
                'logo_clients' => $logo,
                'secondary_address1' => $request->secondary_address1,
                'secondary_address2' => $request->secondary_address2,
                'secondary_city' => $request->secondary_city,
                'secondary_state' => $request->secondary_state,
                'secondary_postal' => $request->secondary_postal,
                'secondary_country' => $request->secondary_country,
            ]);
            if($request->hasFile('logo_clients')){
                $request->file('logo_clients')->move(public_path().'/uploads/', $request->file('logo_clients')->getClientOriginalName());
            }
            return response()->json([
                'success' => true,
                'message' => 'Successfully created client'
            ]);
        } catch (\Throwable $th) {
            error_log($th);
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }

    public function deleteClient(Request $request)
    {
        try {
            $user = $request->user();
            $client_id = $request->route('id');
            $data = Client::where('id', $client_id)->first();
            if ($data == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Client ID is not found'
                ]);
            }
            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted client'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }
}
