<?php

namespace App\Http\View;

use Illuminate\View\View;
use App\Models\WebsiteNoticeModel;

// This composer will show notices in the website notice section.
class NoticeComposer
{
    public function compose(View $view)
    {
        // Fetch your Notice links from the database
        $notices = WebsiteNoticeModel::where('enable_status', 'on')
                           ->orderByDesc('id')
                           ->get();

        // Pass the data to the view under the variable name 'notices'
        $view->with('notices', $notices);
    }
}