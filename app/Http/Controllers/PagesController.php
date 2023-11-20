<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Carbon\Carbon;
use Dcblogdev\MsGraph\Facades\MsGraph;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function emails()
    {
//        $data = [
//            'displayName' => 'John Smith',
//            'givenName' => 'John Smith',
//            'emailAddresses' => [
//                [
//                    'address' => 'j.smith@domain.com',
//                    'name' => 'John Smith'
//                ]
//            ]
//        ];
//        MsGraph::contacts()->store($data);

//        $name = 'Haider Dev';
//        $folder = MsGraph::get("me?\$displayName=,'$name'");
//        $folderType = 'Inbox';
//        $folder = MsGraph::get("me/mailFolders?\$filter=startswith(displayName,'$folderType')");
//        dd($folder);
//
//        dd(MsGraph::get('me/mailFolders/Inbox'));
//        dd(MsGraph::get('me/contacts'));
//        dd(MsGraph::contacts()->get());
//
////        dd(MsGraph::isConnected());
//        dd(MsGraph::emails()->get());
        $data = MsGraph::emails()->get();

        if (count($data['emails']['value']) > 0) {
            foreach ($data['emails']['value'] as $item) {
                $item = (array)$item;
                $existingEmail = Email::where([
                    'subject' => $item['subject'],
                    'from' => $item['from']['emailAddress']['address'],
                    'to' => $item['toRecipients'][0]['emailAddress']['address'],
                    ])->first();

                if (is_null($existingEmail))
                $email = Email::create([
                    'subject' => $item['subject'],
                    'body' => $item['body']['content'],
                    'from' => $item['from']['emailAddress']['address'],
                    'to' => $item['toRecipients'][0]['emailAddress']['address'],
                    'date' => Carbon::parse($item['createdDateTime'])
                ]);
            }
        }

        $emails = Email::orderBy('id', 'desc')->paginate(15);
        return view('emails')->with([
            'data' => $emails
        ]);
    }
    public function getAllEmails()
    {
        $emails = Email::all();
        return view('emails')->with([
            'data' => $emails
        ]);
    }
    public function composeEmail()
    {
        return view('compose-email');
    }

    public function sendEmail(Request $request)
    {
//        dd($request->all());

        $email = Email::create([
            'subject' => $request->subject,
            'body' => $request->body,
            'from' => 'demo@123.com',
            'to' => $request->to,
            'date' => now(),
        ]);

        if ($email) {

            MsGraph::emails()
                ->to([$request->to])
                ->subject($request->subject)
                ->body($request->body)
                ->send();

            session()->flash('success', 'Operation successful.');
        } else {
            session()->flash('error', 'Operation failed.');
        }

        return redirect()->route('emails');
    }

    public function app()
    {
        return view('app');
    }

    public function show($id)
    {
        $email = Email::find($id);

        return view('detail-email')->with([
            'data' => $email
        ]);
    }
}
