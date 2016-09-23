<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Facebook\Exceptions\FacebookSDKException;
use Sammy;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;
use Symfony\Component\HttpFoundation\Request;

class SocialPostingController extends Controller
{

    private $fb;


    public function __construct(LaravelFacebookSdk $fb)
    {
        $this->fb = $fb;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     *
     */
    public function index(Request $request)
    {

        if ($request->session()->has('fb_user_access_token')) {//check id isset fb_user_access_token
            return redirect()->route('createpost');
        } else {
            return view('social-posting.index', ['url' => $this->fb->getLoginUrl(['email', 'publish_actions', 'user_posts'])]);
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * Handle facebook callback request
     */
    public function facebookCallback(Request $request)
    {
        // Obtain an access token.
        try {
            $token = $this->fb->getAccessTokenFromRedirect();
        } catch (FacebookSDKException $e) {

            dd($e->getMessage());
        }

        if ($token != null) { //Check if token is empty

            if (!$token->isLongLived()) {
                // OAuth 2.0 client handler
                $oauth_client = $this->fb->getOAuth2Client();

                // Extend the access token.
                try {
                    $token = $oauth_client->getLongLivedAccessToken($token);
                } catch (FacebookSDKException $e) {
                    dd($e->getMessage());
                }
            }
            $this->fb->setDefaultAccessToken($token);
            $request->session()->put('fb_user_access_token', (string)$token);
            return redirect()->route('createpost');

        } else {
            return $this->index($request);
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * Create user post
     */
    public function createPost(Request $request)
    {

        if ($request->session()->has('fb_user_access_token')) {
            if ($request->isMethod('post')) {
                $message = $request->input('message');
                try {
                    $createPost = $this->fb->post("/me/feed", ['message' => $message], $request->session()->get('fb_user_access_token'));
                    if ($createPost) {
                        echo "Your message has been posted successfully !!";
                    }
                } catch (FacebookSDKException $e) {
                    dd($e->getMessage());
                }
            }
            return view('social-posting.create');
        } else {
            return $this->index($request);
        }
    }


}
