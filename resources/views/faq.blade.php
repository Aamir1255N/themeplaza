@extends('layout.master')
@section('content')

<div class="container-fluid mt-4">
    <div class="container">
        <h2 class="display-4">
            Frequently Asked Questions </h2>

        <hr />

        <div id="alerts">
        </div>
    </div>
    <div class="container">
        <div class="card mb-4">
            <h3 class="card-header">Q: What is this site?</h3>
            <div class="card-body">
                <p class="card-text"> This is a site for uploading, sharing and downloading <a
                        href="https://themeplaza.eu/themes">themes</a>, <a
                        href="https://themeplaza.eu/splashes">splashes</a> and <a
                        href="https://themeplaza.eu/badges">badges</a> on your Nintendo 3DS, 2DS, New Nintendo 3DS and
                    2DS systems with access to either <a href="http://smealum.github.io/3ds/">homebrew</a> or <a
                        href="https://3ds.guide/">CFW</a> access.</p>
            </div>
        </div>
        <div class="card mb-4">
            <h3 class="card-header">Q: How do I use this site then and what are the QR codes for?</h3>
            <div class="card-body">
                <p class="card-text"> You can use <a
                        href="https://github.com/astronautlevel2/Anemone3DS/releases/latest">Anemone</a> to download
                    themes and splashes directy to your console using the QR codes on the item page. You could also
                    directly download the zip file and place it in your `themes` or `splashes` folder on the root of
                    your SD card.</p>
            </div>
        </div>
        <div class="card mb-4">
            <h3 class="card-header">Q: I uploaded something and it's awaiting approval, how do I get accepted?</h3>
            <div class="card-body">
                <p class="card-text">
                <p>When you first start uploading things to the site, a site admin has to approve your items for content
                    control.</p>
                <p><strong>No, we do not know when your theme will be approved and no asking will not make it go
                        faster.</strong></p>
                <p>If you upload 5 items and they all get accepted, you are given the Trusted status and then when you
                    upload, they will be accepted automatically.</p>
                <p>If one of your items is rejected, your Trusted status will be removed and you will have to upload 5
                    more items to get accepted again.</p>
                <p>Theme Plaza reserves the right to reject your theme for any reason, including but not limited to
                    breaches of our <a style="color: #4af;" href="terms.html">Terms of Service</a>.</p>
                </p>
            </div>
        </div>
        <div class="card mb-4">
            <h3 class="card-header">Q: What limits are there to what I can upload to the site?</h3>
            <div class="card-body">
                <p class="card-text"> We currently don't accept the following
                <ul>
                    <li>Official themes made by Nintendo</li>
                    <li>Loli/shota/other CP content</li>
                    <li>Hate content</li>
                    <li>Images containing real life people. The exceptions to this rule are if the person is famous
                        (celebrity, an internet personality; JonTron for example or a general *star that's otherwise
                        widely known) or is in a stock image</li>
                </ul>
                <p>We will reject these if you upload them.</p>
                <p>We may take down your theme if another user reports that you have stolen it. If we do so, you will
                    lose your Trusted status (as we cannot trust you won't do it again). We will do this at our
                    discretion, and it may be appealed.</p>
                <p>Please bear in mind that if you constantly violate the upload rules/<a href="terms.html">ToS</a>, it
                    can/will result in your account being terminated and all uploaded content being deleted.</p>
                </p>
            </div>
        </div>
        <div class="card mb-4">
            <h3 class="card-header">Q: Why did I lose the Trusted status?</h3>
            <div class="card-body">
                <p class="card-text"> If you notice that you have lost the Trusted status on your account, it may be due
                    to one of the following reasons:
                <ul>
                    <li>You are uploading many versions of the same theme - this counts as spam. Delete your previous
                        versions first.</li>
                    <li>You have uploaded 5+ themes in a short span of time. This causes new themers to have their
                        themes pushed down in the search results, which is bad for their exposure and for the community
                        as a whole.</li>
                    <li>You have uploaded a theme which violates the upload rules.</li>
                </ul>
                This punishment may also be applied for reasons not covered by the above.
                <br />
                If you think this has been applied in error, please open a support ticket on our Discord (link in
                header).</p>
            </div>
        </div>
        <div class="card mb-4">
            <h3 class="card-header">Q: How do I use the search?</h3>
            <div class="card-body">
                <p class="card-text"> Theme Pizza has a rich search engine with many commands that may not be
                    immediately apparent. to use them, type them in the search bar, followed by your query. The commands
                    are:
                <ul>
                    <li>NSFW:[all/safe/sketchy/nsfw]</li>
                    <li>Tag:[tag name]</li>
                    <li>User:[username]</li>
                    <li>Quotation marks around a search for exact results.</li>
                </ul>
                </p>
            </div>
        </div>
        <div class="card mb-4">
            <h3 class="card-header">Q: How can I change my avatar?</h3>
            <div class="card-body">
                <p class="card-text"> We use a site called <a href="https://en.gravatar.com/">Gravatar</a> to handle our
                    avatars.<br />
                    Simply register on there with the same email you used on ThemePlaza and upload your avatar!</p>
            </div>
        </div>
        <div class="card mb-4">
            <h3 class="card-header">Q: Who do I contact to report abuse (rights infringement, abusive comments, etc.)?
            </h3>
            <div class="card-body">
                <p class="card-text"> If somebody has done one of the below, use the 'Report Content' button on the
                    content in question:
                <ul>
                    <li>Reuploaded your theme with very minor edits</li>
                    <li>Uploaded an official theme acquired from the Nintendo 3DS Theme Shop</li>
                    <li>Infringed upon your copyright in general, e.g. used your music or imagery in a way that violates
                        your rights as copyright holder</li>
                </ul>
                If somebody has done something to you that you do not feel is remedied by reporting the content, please
                join our Discord (link in header).</p>
            </div>
        </div>
    </div> 
    @endsection