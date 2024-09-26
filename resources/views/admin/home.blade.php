@extends('layouts.admin')
@section('content')

<div class="row main-back-color">
    <label class="back-gray lable-radius">
        OpenAI Image Generation Pro
    </label>
    <div class="home-back">
        <div class="w-full intro-label">
            This Is a Demo Project for AI Image Generation. Try Now!
        </div>
        <div class="intro-me">
            <img class="intro-img" src="./images/me.png"/>
            <div class="intro-text">
                <label>
                    Hey I am Ivan Sailovic.
                </label>
                <label class="intro-gray">
                    I am the developer of this project.
                </label>
            </div>
        </div>
        <div class="intro-me">
            <div class="intro-text">
                <label class="intro-stack">
                    Generate AI Image <span class="pro-span">Pro</span>
                </label>
                <label class="intro-stack">
                    What Ever You Want
                </label>
            </div>

        </div>

        <div class="intro-me">
            <label class="intro-ai">
                AI image generation is the ability to create images from textual descriptions. <br> Models like OpenAI’s DALL-E and Stability AI’s Stable Diffusion have gained <br> popularity for their ability to transform words into highly detailed and contextually relevant images.
            </label>
        </div>

        <div class="intro-me">
            <a href="admin/images" class="btn-start">
                Get AI Generated Images
                <span class="span-now">Now!</span>
            </a>
        </div>
    </div>

</div>

@endsection
