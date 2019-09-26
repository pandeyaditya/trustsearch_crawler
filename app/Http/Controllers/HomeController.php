<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPHtmlParser\Dom;
use Symfony\Component\HttpClient\HttpClient;

class HomeController extends Controller
{
    public function search(Request $request){

        $request->validate([
            'search_item' => 'required'
        ]);

        // Fetch form inputs
        $website    = $request->input('search_item');
        $searchmode = $request->input('searchmode');

        // Dom Parser object is created
        $dom = new Dom;
        $data = [];


        $pilot_store = 'https://www.trustpilot.com/review/www.';
        $trusted_store = 'https://api.trustedshops.com/rest/public/v2/shops?url=';


        // Use Public API for Trustedsearch
        if($searchmode == "trustedsearch"){
            try{
                $client = HttpClient::create();
                $response = $client->request('GET', $trusted_store.$website);
                $content = $response->getContent();
                $result = simplexml_load_string($content);

                // This doesn't seems to work, because the time in which the data is returned,
                // till that time the node (.) in the trustedshops site is rendered, the response is returned as not found.

                // if(!empty($result)){
                //     foreach($result->data->shops->shop as $shop){
                //         $response2 = $client->request('GET', 'https://api.trustedshops.com/rest/public/v2/shops/'.$shop->tsId.'/reviews');
                //         $statusCode = $response->getStatusCode();
        
                //         if($statusCode != 200){
                //             return 'Error';exit;
                //         }               
                //         $content2 = $response2->getContent();
                //         $shop_results = simplexml_load_string($content2);
                //     }
                // }

                $data['shops'] = $result->data->shops->shop;
                return view('trustsearch')->with('data',$data);
            }            
            catch(Exception $e){
                throw new Exception($e->getMessage());
            }            
        }
        else{
            try{
                $dom->loadFromUrl($pilot_store.$website.'.com');

                // Find logo
                $content = $dom->find('.business-unit-profile-summary__image');            
                $data['logo'] = $content->src;
    
                // // // Find Country
                // $country = $dom->find('.contact-point__details>div');
                // $data['country'] = $country->innerHtml;

                // //Find Claim
                // $claim_status = $dom->find('div.badge-card__header');
                // $data['claim_status'] = $claim_status->innerHtml;
    
                //Star Rating
                $star_rating = $dom->find('.star-rating');
                $data['star_rating'] = $star_rating;
    
                //Review Count
                $review_count = $dom->find('.headline__review-count');
                $data['review_count'] = $review_count;
    
                // Find reviews
                $review_content = $dom->find('.review-list');
                $data['reviews_list'] = $review_content;
    
                return view('pilotsearch')->with('data',$data);
            }
            catch(Exception $e){
                throw new Exception($e->getMessage());
            }

            
        }          

    }
}
