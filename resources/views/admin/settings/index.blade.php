@extends('layouts.admin')

@section('content')
    <div class="header">
        <h1>Site Settings</h1>
    </div>

    <div class="card">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                <div>
                    <h3>General Info</h3>
                    <hr style="margin: 15px 0;">
                    <div class="form-group">
                        <label>Site Name</label>
                        <input type="text" name="site_name" value="{{ $settings['site_name'] ?? '' }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Hero Title</label>
                        <input type="text" name="hero_title" value="{{ $settings['hero_title'] ?? '' }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Hero Subtitle</label>
                        <input type="text" name="hero_subtitle" value="{{ $settings['hero_subtitle'] ?? '' }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Hero Profession</label>
                        <input type="text" name="hero_profession" value="{{ $settings['hero_profession'] ?? '' }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Hero Description</label>
                        <textarea name="hero_description" class="form-control" rows="4">{{ $settings['hero_description'] ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Site Logo</label>
                        @if(isset($settings['logo']))
                            <div style="margin-bottom: 10px;">
                                <img src="{{ asset('storage/' . $settings['logo']) }}" alt="" style="height: 40px; background: #333; padding: 5px; border-radius: 4px;">
                            </div>
                        @endif
                        <input type="file" name="logo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Hero Image</label>
                        @if(isset($settings['hero_image']))
                            <div style="margin-bottom: 10px;">
                                <img src="{{ asset('storage/' . $settings['hero_image']) }}" alt="" style="width: 100px; border-radius: 4px;">
                            </div>
                        @endif
                        <input type="file" name="hero_image" class="form-control">
                    </div>
                </div>
                <div>
                    <h3>Contact & Social</h3>
                    <hr style="margin: 15px 0;">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $settings['email'] ?? '' }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{ $settings['phone'] ?? '' }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Facebook Link</label>
                        <input type="url" name="facebook" value="{{ $settings['facebook'] ?? '' }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Twitter Link</label>
                        <input type="url" name="twitter" value="{{ $settings['twitter'] ?? '' }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>LinkedIn Link</label>
                        <input type="url" name="linkedin" value="{{ $settings['linkedin'] ?? '' }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Instagram Link</label>
                        <input type="url" name="instagram" value="{{ $settings['instagram'] ?? '' }}" class="form-control">
                    </div>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <button type="submit" class="btn btn-primary">Save Settings</button>
            </div>
        </form>
    </div>
@endsection
