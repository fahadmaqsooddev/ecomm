<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Models\Category;

use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionMail;
use App\Events\UserSubscribed;
use App\Models\Contact;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Service;
use App\Models\AboutUs;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class WebsiteController extends Controller
{

    public function index(){
        $blogs=Blog::all();
        $products=Product::where('quantity','>',0)->get();
        $categories=Category::all();
        return view('index',compact('blogs','products','categories'));
    }

    public function contactus(){
        return view('contactus');
    }

    public function store(Request $request)
    {

        //dd($request->all());
        
        // Validate the request data
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone_number' => 'required|regex:/^\d{11}$/', // Validates phone number format
            'email' => 'required|email|max:255',
            'order_number' => 'required|string|max:50',
            'company_name' => 'required|string|max:255',
            'rma_number' => 'required|string|max:50',
            'comments' => 'required|string',
        ]);


        // Create a new contact using mass assignment with all data
        Contact::create($request->all());

        // Redirect or return a response
        return redirect()->route('contactus')->with('success', 'Message Sent successfully!');
    }

    
    public function newsletter(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|unique:subscribers,email',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->to(url()->previous() . '#footer') // 🔥 anchor preserved
                ->withErrors($validator, 'newsletter')
                ->withInput();
        }

        $subscriber = Subscriber::create([
            'email' => $request->email,
        ]);

        event(new UserSubscribed($subscriber));

        return redirect()
            ->to(url('/') . '#footer') // 🔥 success scroll
            ->with('success', 'You have successfully subscribed to our newsletter. Check your email!');
    }

    public function categorydetail($id){
       // Get the category with the given ID and its related products
        $category = Category::with('products')->findorFail($id);

        return view('category',compact('category'));
    }
    public function productdetail($id){
        $product=Product::findOrFail($id);
         $related_products=Product::where('category_id',$product->category_id)
        ->where('id','<>',$product->id)
        ->where('quantity','>',0)
        ->get();
         return view('product-detail',compact('product','related_products'));
    }


    public function blogs(){
        $blogs=Blog::all();
        return view('blog',compact('blogs'));
    }
    public function brands(){
        $brands=Brand::all();
        return view('brand',compact('brands'));
    }

    public function services(){
        $services=Service::all();
        return view('services',compact('services'));
    }

    public function aboutus(){
        $data=AboutUs::first();
        return view('aboutus',compact('data'));
    }

    public function register(){
        $countries = [
            "" => "Choose a Country",
            "Afghanistan" => "Afghanistan",
            "Åland Islands" => "Åland Islands",
            "Albania" => "Albania",
            "Algeria" => "Algeria",
            "American Samoa" => "American Samoa",
            "Andorra" => "Andorra",
            "Angola" => "Angola",
            "Anguilla" => "Anguilla",
            "Antarctica" => "Antarctica",
            "Antigua and Barbuda" => "Antigua and Barbuda",
            "Argentina" => "Argentina",
            "Armenia" => "Armenia",
            "Aruba" => "Aruba",
            "Australia" => "Australia",
            "Austria" => "Austria",
            "Azerbaijan" => "Azerbaijan",
            "Bahamas" => "Bahamas",
            "Bahrain" => "Bahrain",
            "Bangladesh" => "Bangladesh",
            "Barbados" => "Barbados",
            "Belarus" => "Belarus",
            "Belgium" => "Belgium",
            "Belize" => "Belize",
            "Benin" => "Benin",
            "Bermuda" => "Bermuda",
            "Bhutan" => "Bhutan",
            "Bolivia" => "Bolivia",
            "Bonaire, Sint Eustatius and Saba" => "Bonaire, Sint Eustatius and Saba",
            "Bosnia and Herzegovina" => "Bosnia and Herzegovina",
            "Botswana" => "Botswana",
            "Bouvet Island" => "Bouvet Island",
            "Brazil" => "Brazil",
            "British Indian Ocean Territory" => "British Indian Ocean Territory",
            "Brunei Darussalam" => "Brunei Darussalam",
            "Bulgaria" => "Bulgaria",
            "Burkina Faso" => "Burkina Faso",
            "Burundi" => "Burundi",
            "Cambodia" => "Cambodia",
            "Cameroon" => "Cameroon",
            "Canada" => "Canada",
            "Cape Verde" => "Cape Verde",
            "Cayman Islands" => "Cayman Islands",
            "Central African Republic" => "Central African Republic",
            "Chad" => "Chad",
            "Chile" => "Chile",
            "China" => "China",
            "Christmas Island" => "Christmas Island",
            "Cocos (Keeling) Islands" => "Cocos (Keeling) Islands",
            "Colombia" => "Colombia",
            "Comoros" => "Comoros",
            "Congo" => "Congo",
            "Congo, the Democratic Republic of the" => "Congo, the Democratic Republic of the",
            "Cook Islands" => "Cook Islands",
            "Costa Rica" => "Costa Rica",
            "Cote d'Ivoire" => "Cote d'Ivoire",
            "Croatia" => "Croatia",
            "Curaçao" => "Curaçao",
            "Cyprus" => "Cyprus",
            "Czechia" => "Czechia",
            "Denmark" => "Denmark",
            "Djibouti" => "Djibouti",
            "Dominica" => "Dominica",
            "Dominican Republic" => "Dominican Republic",
            "Ecuador" => "Ecuador",
            "Egypt" => "Egypt",
            "El Salvador" => "El Salvador",
            "Equatorial Guinea" => "Equatorial Guinea",
            "Eritrea" => "Eritrea",
            "Estonia" => "Estonia",
            "Eswatini" => "Eswatini",
            "Ethiopia" => "Ethiopia",
            "Falkland Islands (Malvinas)" => "Falkland Islands (Malvinas)",
            "Faroe Islands" => "Faroe Islands",
            "Fiji" => "Fiji",
            "Finland" => "Finland",
            "France" => "France",
            "French Guiana" => "French Guiana",
            "French Polynesia" => "French Polynesia",
            "French Southern Territories" => "French Southern Territories",
            "Gabon" => "Gabon",
            "Gambia" => "Gambia",
            "Georgia" => "Georgia",
            "Germany" => "Germany",
            "Ghana" => "Ghana",
            "Gibraltar" => "Gibraltar",
            "Greece" => "Greece",
            "Greenland" => "Greenland",
            "Grenada" => "Grenada",
            "Guadeloupe" => "Guadeloupe",
            "Guam" => "Guam",
            "Guatemala" => "Guatemala",
            "Guernsey" => "Guernsey",
            "Guinea" => "Guinea",
            "Guinea-Bissau" => "Guinea-Bissau",
            "Guyana" => "Guyana",
            "Haiti" => "Haiti",
            "Heard Island and Mcdonald Islands" => "Heard Island and Mcdonald Islands",
            "Holy See (Vatican City State)" => "Holy See (Vatican City State)",
            "Honduras" => "Honduras",
            "Hong Kong" => "Hong Kong",
            "Hungary" => "Hungary",
            "Iceland" => "Iceland",
            "India" => "India",
            "Indonesia" => "Indonesia",
            "Iraq" => "Iraq",
            "Ireland" => "Ireland",
            "Isle of Man" => "Isle of Man",
            "Israel" => "Israel",
            "Italy" => "Italy",
            "Jamaica" => "Jamaica",
            "Japan" => "Japan",
            "Jersey" => "Jersey",
            "Jordan" => "Jordan",
            "Kazakhstan" => "Kazakhstan",
            "Kenya" => "Kenya",
            "Kiribati" => "Kiribati",
            "Korea, Republic of" => "Korea, Republic of",
            "Kuwait" => "Kuwait",
            "Kyrgyzstan" => "Kyrgyzstan",
            "Lao People's Democratic Republic" => "Lao People's Democratic Republic",
            "Latvia" => "Latvia",
            "Lebanon" => "Lebanon",
            "Lesotho" => "Lesotho",
            "Liberia" => "Liberia",
            "Libya" => "Libya",
            "Liechtenstein" => "Liechtenstein",
            "Lithuania" => "Lithuania",
            "Luxembourg" => "Luxembourg",
            "Macao" => "Macao",
            "Madagascar" => "Madagascar",
            "Malawi" => "Malawi",
            "Malaysia" => "Malaysia",
            "Maldives" => "Maldives",
            "Mali" => "Mali",
            "Malta" => "Malta",
            "Marshall Islands" => "Marshall Islands",
            "Martinique" => "Martinique",
            "Mauritania" => "Mauritania",
            "Mauritius" => "Mauritius",
            "Mayotte" => "Mayotte",
            "Mexico" => "Mexico",
            "Micronesia, Federated States of" => "Micronesia, Federated States of",
            "Moldova, Republic of" => "Moldova, Republic of",
            "Monaco" => "Monaco",
            "Mongolia" => "Mongolia",
            "Montenegro" => "Montenegro",
            "Montserrat" => "Montserrat",
            "Morocco" => "Morocco",
            "Mozambique" => "Mozambique",
            "Myanmar" => "Myanmar",
            "Namibia" => "Namibia",
            "Nauru" => "Nauru",
            "Nepal" => "Nepal",
            "Netherlands" => "Netherlands",
            "Netherlands Antilles" => "Netherlands Antilles",
            "New Caledonia" => "New Caledonia",
            "New Zealand" => "New Zealand",
            "Nicaragua" => "Nicaragua",
            "Niger" => "Niger",
            "Nigeria" => "Nigeria",
            "Niue" => "Niue",
            "Norfolk Island" => "Norfolk Island",
            "Northern Mariana Islands" => "Northern Mariana Islands",
            "Norway" => "Norway",
            "Oman" => "Oman",
            "Pakistan" => "Pakistan",
            "Palau" => "Palau",
            "Palestine, State of" => "Palestine, State of",
            "Panama" => "Panama",
            "Papua New Guinea" => "Papua New Guinea",
            "Paraguay" => "Paraguay",
            "Peru" => "Peru",
            "Philippines" => "Philippines",
            "Pitcairn" => "Pitcairn",
            "Poland" => "Poland",
            "Portugal" => "Portugal",
            "Puerto Rico" => "Puerto Rico",
            "Qatar" => "Qatar",
            "Republic of Kosovo" => "Republic of Kosovo",
            "Republic of North Macedonia" => "Republic of North Macedonia",
            "Reunion" => "Reunion",
            "Romania" => "Romania",
            "Russian Federation" => "Russian Federation",
            "Rwanda" => "Rwanda",
            "Saint Helena" => "Saint Helena",
            "Saint Kitts and Nevis" => "Saint Kitts and Nevis",
            "Saint Lucia" => "Saint Lucia",
            "Saint Martin (France)" => "Saint Martin (France)",
            "Saint Pierre and Miquelon" => "Saint Pierre and Miquelon",
            "Saint Vincent and the Grenadines" => "Saint Vincent and the Grenadines",
            "Samoa" => "Samoa",
            "San Marino" => "San Marino",
            "Sao Tome and Principe" => "Sao Tome and Principe",
            "Saudi Arabia" => "Saudi Arabia",
            "Senegal" => "Senegal",
            "Serbia" => "Serbia",
            "Seychelles" => "Seychelles",
            "Sierra Leone" => "Sierra Leone",
            "Singapore" => "Singapore",
            "Sint Maarten" => "Sint Maarten",
            "Slovakia" => "Slovakia",
            "Slovenia" => "Slovenia",
            "Solomon Islands" => "Solomon Islands",
            "Somalia" => "Somalia",
            "South Africa" => "South Africa",
            "South Georgia and the South Sandwich Islands" => "South Georgia and the South Sandwich Islands",
            "Spain" => "Spain",
            "Sri Lanka" => "Sri Lanka",
            "St. Barthélemy" => "St. Barthélemy",
            "Sudan" => "Sudan",
            "Suriname" => "Suriname",
            "Svalbard and Jan Mayen" => "Svalbard and Jan Mayen",
            "Sweden" => "Sweden",
            "Switzerland" => "Switzerland",
            "Taiwan" => "Taiwan",
            "Tajikistan" => "Tajikistan",
            "Tanzania, United Republic of" => "Tanzania, United Republic of",
            "Thailand" => "Thailand",
            "Timor-Leste" => "Timor-Leste",
            "Togo" => "Togo",
            "Tokelau" => "Tokelau",
            "Tonga" => "Tonga",
            "Trinidad and Tobago" => "Trinidad and Tobago",
            "Tunisia" => "Tunisia",
            "Turkey" => "Turkey",
            "Turkmenistan" => "Turkmenistan",
            "Turks and Caicos Islands" => "Turks and Caicos Islands",
            "Tuvalu" => "Tuvalu",
            "Uganda" => "Uganda",
            "Ukraine" => "Ukraine",
            "United Arab Emirates" => "United Arab Emirates",
            "United Kingdom" => "United Kingdom",
            "United States" => "United States",
            "United States Minor Outlying Islands" => "United States Minor Outlying Islands",
            "Uruguay" => "Uruguay",
            "Uzbekistan" => "Uzbekistan",
            "Vanuatu" => "Vanuatu",
            "Venezuela" => "Venezuela",
            "Viet Nam" => "Viet Nam",
            "Virgin Islands, British" => "Virgin Islands, British",
            "Virgin Islands, U.S." => "Virgin Islands, U.S.",
            "Wallis and Futuna" => "Wallis and Futuna",
            "Western Sahara" => "Western Sahara",
            "Yemen" => "Yemen",
            "Zambia" => "Zambia",
            "Zimbabwe" => "Zimbabwe"
        ];
        return view('signup',compact('countries'));
    }

    public function login(){
        return view('signin');

    }
    public function blogdetail(Blog $blog){
        return view('blog-detail',compact('blog'));
    }

    public function searchitem(Request $request)
    {
        $sort = $request->input('sort');
        $category_id = $request->input('category_id');
        
        // Start the query for fetching products
        $query = Product::where('quantity','>',0);

        // Apply the category filter if category_id is provided
        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        // Apply sorting based on the selected sort option
        switch ($sort) {
            case 'newest':
                // Sort by newest items (created_at descending)
                $query->orderBy('created_at', 'desc');
                break;
            case 'bestselling':
                // Sort by best selling (assuming you have a 'sales_count' column)
                $query->orderBy('sales_count', 'desc');
                break;
            case 'alphaasc':
                // Sort alphabetically A to Z by name
                $query->orderBy('name', 'asc');
                break;
            case 'alphadesc':
                // Sort alphabetically Z to A by name
                $query->orderBy('name', 'desc');
                break;
            case 'avgcustomerreview':
                // Sort by customer reviews (assuming you have an 'avg_rating' column)
                $query->orderBy('avg_rating', 'desc');
                break;
            case 'priceasc':
                // Sort by price ascending
                $query->orderBy('price', 'asc');
                break;
            case 'pricedesc':
                // Sort by price descending
                $query->orderBy('price', 'desc');
                break;
            case 'featured':
            default:
                // Default: Sort by featured status (assuming you have a 'featured' column)
                $query->orderBy('featured', 'desc');
                break;
        }

        // Fetch the products from the database
        $products = $query->get();

        // Return the products as a JSON response
        return response()->json([
            'success' => true,
            'items' => $products
        ]);
    }


    public function showProducts(Brand $brand)
    {
     
        $products = $brand->products()->paginate(12);
        return view('products', compact('brand', 'products'));
    }

}
