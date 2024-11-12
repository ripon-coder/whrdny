<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\AdmissionForm;
use App\Models\BoardTrust;
use App\Models\Brand;
use App\Models\Comment;
use App\Models\Faq;
use App\Models\FoundRaise;
use App\Models\History;
use App\Models\HowWeWork;
use App\Models\Mission;
use App\Models\Objective;
use App\Models\Overview;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Vission;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\Learning;
use App\Models\PhotoGallery;
use App\Models\Setting;
use App\Models\VideoGallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
		$data['posts'] = Post::withCount('comment')->latest()->limit(10)->get();
		$data['sliders'] = Slider::whereStatus('published')->get();
		$data['brands'] = Brand::whereStatus('published')->get();
		$data['events'] = Event::whereStatus('published')->orderBy("id","desc")->limit(6)->get();
		$data['learnings'] = Learning::latest()->take(6)->get();
		$data['upcoming_events'] = Event::whereStatus('published')->where("upcoming", true)->orderBy("id", "desc")->get();
		$data['fund_raises'] = FoundRaise::whereStatus('published')->withSum('donation', 'raise')->withCount('donation')->orderBy('id', 'DESC')->limit(4)->get();
        $data['latest_found'] = FoundRaise::whereStatus('published')->withSum('donation', 'raise')->withCount('donation')->latest()->first();
        //dd($data['latest_found']->toArray());
		return view('pages.index', $data);
	}
	public function newsEvents()
	{
		$data['page_name'] = "News & Events";
		$data['events'] = Event::whereStatus('published')->paginate(10);
		return view('pages.news-events', $data);
	}
	public function event($url)
	{
		$data['event'] = Event::whereStatus("published")->whereSlug($url)->firstOrFail();
		$data['next_post'] = Event::where('id', '>', $data['event']->id)
			->whereStatus("published")
			->first();

		$data['previous_post'] = Event::where('id', '<', $data['event']->id)
			->whereStatus("published")
			->first();

		$data['page_name'] = $data['event']->title;
		return view('pages.event', $data);
	}
	public function whatWeDo()
	{
		$data['page_name'] = "WHAT WE DO";
		$data['fund_raises'] = FoundRaise::whereStatus('published')->withSum('donation', 'raise')->withCount('donation')->orderBy('id', 'DESC')->paginate(9);
		return view('pages.what-we-do', $data);
	}
	public function causesList()
	{
		$data['page_name'] = "causes list";
		$data['fund_raises'] = FoundRaise::whereStatus('published')->withSum('donation', 'raise')->withCount('donation')->orderBy('id', 'DESC')->paginate(9);
		return view('pages.causes-list', $data);
	}
	public function whoWeAre()
	{
		$data['page_name'] = "who we are";
		$data['board_trust'] = BoardTrust::whereStatus('published')->latest()->limit(4)->get();
		return view('pages.who-we-are', $data);
	}
	public function teamMember($id)
	{
		$data['member'] = BoardTrust::whereStatus('published')->findOrFail($id);
		$data['page_name'] = $data['member']->name;
		return view('pages.team-member', $data);
	}
	public function contact()
	{
		$data['page_name'] = "Contact Us";
        $data['c_setting'] = Setting::first();
		return view('pages.contact', $data);
	}
	public function photoGallery()
	{
		$data['page_name'] = "photo gallery";
		$data['photos'] = PhotoGallery::get();
		return view('pages.photo-gallery', $data);
	}
	public function videoGallery()
	{
		$data['page_name'] = "video gallery";
		$data['videos'] = VideoGallery::latest()->get();
		return view('pages.video-gallery', $data);
	}
	public function blog()
	{
		$data['page_name'] = "blog";
		$search = request()->s;
		if ($search) {
			$data['posts'] = Post::where(function ($q) use ($search) {
				$q->where('title', 'like', "%$search%");
			})->withCount('comment')->get();
		} else {
			$data['posts'] = Post::withCount('comment')->orderBy("publish_date",'DESC')->get();
		}
		$startDate = Carbon::now()->subDays(30);
		$data['recent_posts'] = Post::where('created_at', '>=', $startDate)->get();
		return view('pages.blog', $data);
	}
	public function category()
	{
		$data['page_name'] = "category Name";
		return view('pages.blog', $data);
	}
	public function blogDetails(string $id)
	{
		$data['post'] = Post::withCount('comment')->with('comment')->where('id', $id)->firstOrFail();
		$data['prevPost'] = Post::where('id', '<', $id)->orderBy('id', 'desc')->first(['id']);
		$data['nextPost'] = Post::where('id', '>', $id)->orderBy('id', 'desc')->first(['id']);
		$data['page_name'] = $data['post']->title;
		$startDate = Carbon::now()->subDays(30);

		$data['recent_posts'] = Post::where('created_at', '>=', $startDate)->get();
		$data['upcoming_event'] = Event::whereStatus("published")->where('upcoming',true)->latest()->limit(5)->get();
		$data['current_event'] = Event::whereStatus("published")->where('end_date_time','>=', Carbon::now())->limit(5)->get();
		$data['past_event'] = Event::whereStatus("published")->where('end_date_time','<=', Carbon::now())->limit(5)->get();
		$data['photos'] = PhotoGallery::limit(6)->get();
		return view('pages.blog-details', $data);
	}

	public function saveComment(CommentRequest $request, string $postId)
	{
		Post::findOrFail($postId);
		$data = [
			'post_id' => $postId,
			'name' => $request->name,
			'email' => $request->email,
			'website' => $request->website,
			'comment' => htmlspecialchars(strip_tags($request->comment))
		];
		Comment::create($data);
		return redirect()->back()->with('success', 'Comment has been pulished');
	}
	public function donation($slug)
	{
		$startDate = Carbon::now()->subDays(30);

		$data['fund_rise'] = FoundRaise::whereStatus("published")->withSum('donation', 'raise')->withCount('donation')->whereSlug($slug)->firstOrFail();

		$data['next_post'] = FoundRaise::where('id', '>', $data['fund_rise']->id)
			->whereStatus("published")
			->first();

		$data['previous_post'] = FoundRaise::where('id', '<', $data['fund_rise']->id)
			->whereStatus("published")
			->first();

		$data['recent_posts'] = Post::where('created_at', '>=', $startDate)->get();
		$data['upcoming_event'] = Event::whereStatus("published")->where('upcoming',true)->latest()->limit(5)->get();
		$data['current_event'] = Event::whereStatus("published")->where('end_date_time','>=', Carbon::now())->limit(5)->get();
		$data['past_event'] = Event::whereStatus("published")->where('end_date_time','<=', Carbon::now())->limit(5)->get();
		$data['photos'] = PhotoGallery::limit(6)->get();
		$data['page_name'] = $data['fund_rise']->title;
		return view('pages.donation', $data);
	}
	public function events($type = null)
	{
		$data['page_name'] = "Events";
		$data['current_event'] = Event::whereStatus("published")->where('end_date_time','>=', Carbon::now())->get();
		$data['upcoming_event'] = Event::whereStatus("published")->where('upcoming',true)->get();
		$data['past_event'] = Event::whereStatus("published")->where('end_date_time','<=', Carbon::now())->get();
		return view('pages.events', $data);
	}
	public function mission()
	{
		$data['page_name'] = "mission";
		$data['mission'] = Mission::first();
		return view('pages.mission', $data);
	}
	public function vision()
	{
		$data['page_name'] = "vision";
		$data['vission'] = Vission::first();
		return view('pages.vision', $data);
	}
	public function objectives()
	{
		$data['page_name'] = "objectives";
		$data['objective'] = Objective::first();
		return view('pages.objectives', $data);
	}
	public function history()
	{
		$data['page_name'] = "history";
		$data['history'] = History::first();
		return view('pages.history', $data);
	}
	public function overview()
	{
		$data['page_name'] = "overview";
		$data['overview'] = Overview::first();
		return view('pages.overview', $data);
	}
	public function boardOfTrustee()
	{
		$data['page_name'] = "board of trustee";
		$data['board_trust'] = BoardTrust::whereStatus('published')->get();
		return view('pages.board-of-trustee', $data);
	}
	public function faqs()
	{
		$data['page_name'] = "faqs";
		$faqs = Faq::whereStatus('published')->get();
		$total_faqs = Faq::whereStatus('published')->count();
		$half_count = ceil($total_faqs / 2);

		$data['left_faqs'] = $faqs->take($half_count);
		$data['right_faqs'] = $faqs->slice($half_count);
		return view('pages.faqs', $data);
	}
	public function howWork()
	{
		$data['page_name'] = "how we work";
		$data['posts'] = Post::latest()->limit(3)->get();
		$data['howWeWork'] = HowWeWork::first();
		return view('pages.how-we-work', $data);
	}
	public function joinWithUs()
	{
		$data['page_name'] = "join With Us";
        $data['forms'] = AdmissionForm::get();
		return view('pages.join-with-us', $data);
	}
	public function eventSearch(Request $request){
		$data['page_name'] = "Search Events";
		$data['search_result'] = Event::whereStatus("published")->whereDate('start_date_time', $request->key)->get();
		return view('pages.events-search', $data);
	}

	public function donate($slug){
		$data['page_name'] = "Donate";
		$data["fund"] = FoundRaise::whereStatus("published")->withSum('donation', 'raise')->withCount('donation')->whereSlug($slug)->firstOrFail();
		return view('pages.donate',$data);
	}
}
