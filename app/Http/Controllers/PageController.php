<?php

namespace App\Http\Controllers;

use App\Http\Requests\InquiryRequest;
use Carbon\Carbon;
use Google_Client;
use Google_Service_Sheets;
use GuzzleHttp;
use Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\RequestContactMail;

class PageController extends Controller
{
    public function index()
    {
        $data['meta_title'] = 'Depo-Provera Lawsuit | Free Case Evaluation for Injured Patients';
        $data['meta_description'] = 'Learn about the Depo-Provera lawsuit and your eligibility for compensation. If you’ve suffered bone loss, fractures, or other health issues, get a free case evaluation today. No fees unless you win.';
        return view('home');
    }

    public function termsCondition()
    {
        $data['meta_title'] = 'Privacy Policy';
        $data['meta_description'] = 'Privacy Policy';
        return view('terms-and-condition');
    }

    public function privacyPolicy()
    {
        $data['meta_title'] = 'Terms & Conditions';
        $data['meta_description'] = 'Terms & Conditions';
        return view('privacy-and-policy');
    }

    public function depoPrivacyRights()
    {
        $data['meta_title'] = 'Your Privacy Rights | Depo Lawsuit Now – Confidential Legal Support';
        $data['meta_description'] = 'Understand how Depo Lawsuit Now protects your personal information when pursuing a claim. We prioritize confidentiality, secure data handling, and your right to privacy throughout the legal process.';
        return view('depo-privacy-rights');
    }

    function getOriginalClientIp(Request $request = null): string
    {
        $request = $request ?? request();
        $xForwardedFor = $request->header('x-forwarded-for');
        if (empty($xForwardedFor)) {
            // Si está vacío, tome la IP del request.
            $ip = $request->ip();
        } else {
            // Si no, viene de API gateway y se transforma para usar.
            $ips = is_array($xForwardedFor) ? $xForwardedFor : explode(', ', $xForwardedFor);
            $ip = $ips[0];
        }
        return $ip;
    }

    public function storeInquiry(InquiryRequest $request)
    {

        try {
            $allRequest = $request->all();

            if(!isset($allRequest['bot']) || !empty($allRequest['bot_capture'])){
                return back()->with('error', 'Bot captured, wrong form data submit, please try again.');
            }
            if(isset($allRequest['bot']) && !empty($allRequest['bot'])){
                if($allRequest['bot'] != "bot"){
                    return back()->with('error', 'Bot captured, wrong form data submit, please try again.');
                }
            }

            $requestApi = new GuzzleHttp\Client(["verify" => false]);

            $utmData = [
                'utm_source'   => $request->input('utm_source'),
                'utm_medium'   => $request->input('utm_medium'),
                'utm_campaign' => $request->input('utm_campaign'),
                'utm_content'  => $request->input('utm_content'),
                'utm_term'     => $request->input('utm_term'),
                'fbclid'       => $request->input('fbclid'),
                'referer'     => $request->input('referer'),
            ];


            Log::info('UTM Data:', $utmData);
            $request_param['fname'] = $request->first_name;
            $request_param['lname'] = $request->last_name;
            $request_param['phone'] = $request->phone;
            $request_param['email'] = $request->email;
            $request_param['diagnosed_meningioma'] = $request->diagnosed_meningioma;
            // $request_param['RideshareVictim'] = $request->rideshare_victim;
            // $request_param['IPAddress'] = $this->getOriginalClientIp();
            $request_param['UsedDepoProvera'] = $request->used_depo_provera;
            $request_param['t_id'] = $request->xxTrustedFormCertUrl;
            $request_param['VendorLeadId'] = $request->xxTrustedFormToken;


            $request_param['xxTrustedFormToken'] = $request->xxTrustedFormToken;
            $request_param['xxTrustedFormCertUrl'] = $request->xxTrustedFormCertUrl;
            $request_param['xxTrustedFormPingUrl'] = $request->xxTrustedFormPingUrl;

            $request_param['utm_source'] = $utmData['utm_source'];
            $request_param['utm_medium'] = $utmData['utm_medium'];
            $request_param['utm_campaign'] = $utmData['utm_campaign'];
            $request_param['utm_content'] = $utmData['utm_content'];
            $request_param['utm_term'] = $utmData['utm_term'];
            $request_param['fbclid'] = $utmData['fbclid'];
            $request_param['referer'] = $utmData['referer'];
            $request_param['url'] = 'https://depolawsuitnow.com/';

            $requestApi = new \GuzzleHttp\Client(['verify' => true]);
            /* $response = $requestApi->post('https://services.leadconnectorhq.com/hooks/iBHTQkawteG105yYtADm/webhook-trigger/f589832a-dbb6-408a-a5a5-87c5e9874e19', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'json' => $request_param,
            ]);

            $body = $response->getBody()->getContents();
            Log::info('Webhook Response:', ['response' => json_decode($body, true)]); */
            Log::info('Request Payload JSON:', [
                'payload' => json_encode($request_param)
            ]);

            $leadPayload = [
                'first_name'      => $request->first_name,
                'last_name'       => $request->last_name,
                'phone'           => $request->phone,
                'email'           => $request->email,
                'lawsuit'         => 22,
                'depo_exposure'   => strtolower($request->diagnosed_meningioma) === 'yes' ? 589 : 590,
                'trusted_form_url' => $request->xxTrustedFormCertUrl,
            ];
            Log::info('CRM Lead Payload:', [
                'payload' => json_encode($leadPayload)
            ]);
            if (!empty($utmData['utm_source']) && strtolower($utmData['utm_source']) == 'fb_ad' || !empty($utmData['fbclid'])) {
            $crmResponse = $requestApi->post('https://crm.legalactionhelp.com/api/v1/add-lead', [
                'headers' => [
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . config('settings.crm_api_token'),
                ],
                'json' => $leadPayload,
            ]);

            $crmBody = $crmResponse->getBody()->getContents();
            Log::info('CRM Lead Response:', ['response' => json_decode($crmBody, true)]);
            } else {
                Log::info('CRM lead not sent: Not a Facebook UTM.');
            }
            Mail::to(config('settings.to_email'))->send(new RequestContactMail($request_param));


            return redirect()->route('thank-you')->with('success', 'Thank you for your time to fill this form, our representative will connect with you asap.');
        } catch (\Exception $e) {
            Log::error($e);
            Log::error($request->all());
            return back()->with('error', 'Something wen\'t wront, please try again. ');
        }
       /*  $client = new Google_Client();
        $client->setApplicationName('Google Sheets');
        $client->setHttpClient(new \GuzzleHttp\Client([
            'verify' => true,
        ]));
        $client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
        $client->setAuthConfig(public_path('depo-prova-2bcc47a67153.json')); // Path to JSON file
        $client->setAccessType('offline');

        $service = new Google_Service_Sheets($client);

        // Google Sheet ID and range
        $spreadsheetId = config('settings.sheet_id'); // Replace with your Google Sheet ID
        $range = 'Sheet1'; // Replace 'Sheet1' with the name of your sheet

        // Prepare data to append (mapping to your column headings)
        $values = [
            [
                $request->first_name, // Maps to column "First Name"
                $request->last_name,  // Maps to column "Last Name"
                $request->phone,      // Maps to column "Phone"
                $request->email,      // Maps to column "Email"
                $request->message ?? '', // Maps to column "Message"
                $request->accept_terms,
                Carbon::now()->format('Y-m-d H:i:s'),
                $request->xxTrustedFormCertUrl,
                $request->xxTrustedFormToken,
                $request->xxTrustedFormPingUrl
            ],
        ];

        $body = new \Google_Service_Sheets_ValueRange([
            'values' => $values,
        ]);

        // Append data to the sheet
        $params = [
            'valueInputOption' => 'RAW', // Data input option
        ];

        try {
            $result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);

            if ($result) {
                return redirect()->route('thank-you')->with('success', 'Form submitted and data added to Google Sheets successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to add data to Google Sheets: ' . $e->getMessage());
        } */
    }

    public function thankYou()
    {
        $data['meta_title'] = 'Terms & Conditions';
        $data['meta_description'] = 'Terms & Conditions';
        return view('thank-you');
    }
}
