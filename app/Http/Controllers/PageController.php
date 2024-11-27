<?php

namespace App\Http\Controllers;

use App\Http\Requests\InquiryRequest;
use Carbon\Carbon;
use Google_Client;
use Google_Service_Sheets;
use Illuminate\Http\Request;

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

    public function storeInquiry(InquiryRequest $request)
    {
        $client = new Google_Client();
        $client->setApplicationName('Google Sheets');
        $client->setHttpClient(new \GuzzleHttp\Client([
            'verify' => true,
        ]));
        $client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
        $client->setAuthConfig(public_path('depo-prova-2bcc47a67153.json')); // Path to JSON file
        $client->setAccessType('offline');

        $service = new Google_Service_Sheets($client);

        // Google Sheet ID and range
        $spreadsheetId = '1vb4a0iIQSORd2ImjoVopW3ksbyQc0Z4wsPMSrTxEXPo'; // Replace with your Google Sheet ID
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
        }
    }

    public function thankYou()
    {
        $data['meta_title'] = 'Terms & Conditions';
        $data['meta_description'] = 'Terms & Conditions';
        return view('thank-you');
    }
}
