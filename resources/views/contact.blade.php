@extends('layouts.app')

@section('title', 'Contact Us - SAFARI Premium Perfumes')

@section('content')
<!-- Hero Section -->
<section class="relative py-20 md:py-28 bg-[#1a1510]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-[#B8A878] text-sm font-medium tracking-wider uppercase mb-4">Get in Touch</span>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-bold text-white mb-6">Contact Us</h1>
        <p class="text-gray-300 text-lg md:text-xl max-w-2xl mx-auto">We'd love to hear from you. Reach out with any questions, feedback, or inquiries.</p>
    </div>
</section>

<!-- Contact Information & Form -->
<section class="section bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
            <!-- Contact Info -->
            <div>
                <span class="text-[#B8A878] text-sm font-medium tracking-wider uppercase mb-3">Reach Out</span>
                <h2 class="text-3xl md:text-4xl font-display font-bold text-[#0B0B0F] mb-6">Get in Touch</h2>
                <p class="text-gray-600 text-lg mb-8 leading-relaxed">Have a question about our fragrances? Need help finding your perfect scent? Our team is here to assist you.</p>

                <!-- Contact Details -->
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-[#B8A878]/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-[#B8A878]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-[#0B0B0F] text-lg">Visit Us</h3>
                            <p class="text-gray-600">Dubai, UAE</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-[#B8A878]/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-[#B8A878]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-[#0B0B0F] text-lg">Email Us</h3>
                            <p class="text-gray-600">info@rawanaha.com</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-[#B8A878]/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-[#B8A878]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-[#0B0B0F] text-lg">Call Us</h3>
                            <p class="text-gray-600">+1 234 567 890</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-[#B8A878]/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-[#B8A878]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-[#0B0B0F] text-lg">Business Hours</h3>
                            <p class="text-gray-600">Daily: 10:00 AM - 10:00 PM</p>
                        </div>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="mt-10">
                    <h3 class="font-semibold text-[#0B0B0F] text-lg mb-4">Follow Us</h3>
                    <div class="flex gap-4">
                        <a href="#" class="w-12 h-12 rounded-xl bg-[#B8A878]/10 flex items-center justify-center hover:bg-[#B8A878] transition-colors">
                            <svg class="w-5 h-5 text-[#B8A878]" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-12 h-12 rounded-xl bg-[#B8A878]/10 flex items-center justify-center hover:bg-[#B8A878] transition-colors">
                            <svg class="w-5 h-5 text-[#B8A878]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="#" class="w-12 h-12 rounded-xl bg-[#B8A878]/10 flex items-center justify-center hover:bg-[#B8A878] transition-colors">
                            <svg class="w-5 h-5 text-[#B8A878]" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="https://wa.me/923277217367" target="_blank" class="w-12 h-12 rounded-xl bg-[#B8A878]/10 flex items-center justify-center hover:bg-[#B8A878] transition-colors">
                            <svg class="w-5 h-5 text-[#B8A878]" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.892 3.181.001 6.18 1.24 8.451 3.665 2.227 2.226 3.641 5.193 3.641 8.375v.006c-.012 2.198-.889 4.197-2.235 5.575-1.421 1.457-3.322 2.323-5.271 2.38l-.088-.047c-2.06-.996-3.872-1.877-5.297-1.917-.178-.006-.365-.03-.53-.053-.177-.003-.354-.005-.53-.005-.002 0-.003 0-.005 0l.89-.536c.355.002.71.004 1.065.002l.085.001c2.196 1.386 4.578 2.192 7.015 2.192 6.604 0 11.94-5.338 11.94-11.892 0-6.604-5.338-11.892-11.94-11.892-3.18 0-6.17 1.24-8.44 3.665l-.535.89c1.78 2.964 2.883 6.324 2.883 9.875 0 5.064-3.457 9.38-7.84 9.938l-.117-.006c-2.255-.418-4.354-1.357-5.825-2.437l-.538-.89c-1.443-2.364-2.206-5.093-2.206-8.013 0-3.016 1.105-5.795 2.952-7.936 1.873-2.17 4.547-3.593 7.553-3.593 2.963 0 5.764 1.096 7.88 3.048l.516.624c2.214 2.667 3.48 6.027 3.48 9.396 0 6.222-5.05 11.29-11.4 11.29-1.347 0-2.67-.252-3.9-.668l-.632-.632c-1.357-.895-2.735-1.512-4.073-1.832l-.388-.388c-1.418-1.064-3.053-1.68-4.753-1.68H12.94c-2.612 0-4.948.923-6.61 2.485l-.63.63c-1.56 1.56-2.486 3.848-2.486 6.224 0 3.905 2.77 7.304 6.396 8.235l.102.005c1.418-.117 2.77-.588 4.018-1.335.766-.458 1.406-1.047 1.912-1.75l.126-.158c.41-.508.707-1.098.887-1.75l.03-.057c.376-.916.568-1.89.568-2.89 0-1.203-.318-2.335-.89-3.32l-.08-.147c-.523-.943-1.276-1.795-2.226-2.524-.93-.733-2.018-1.314-3.226-1.724l-.38-.116c-.802-.256-1.64-.395-2.49-.395H.057zm8.893 3.472c.084-.152.192-.298.323-.437.137-.146.29-.287.457-.422l.096-.08c.477-.39.987-.686 1.514-.895l.107-.04c.66-.23 1.33-.358 1.99-.385h.016c.593.024 1.166.13 1.702.316l.1.034c.537.143 1.053.37 1.53.677l.093.06c.443.3.84.654 1.183 1.053l.07.08c.32.378.597.787.824 1.214l.043.087c.2.39.35.797.447 1.208l.017.082c.092.407.135.823.128 1.236l-.006.128c-.008.424-.063.843-.165 1.244l-.025.094c-.117.46-.29.902-.514 1.313l-.065.125c-.27.492-.6.95-.98 1.365l-.108.123c-.44.46-.94.854-1.486 1.175l-.125.07c-.582.312-1.196.55-1.826.71l-.14.036c-.67.162-1.36.242-2.057.238h-.028c-.69 0-1.374-.093-2.03-.276l-.14-.04c-.63-.176-1.225-.436-1.768-.775l-.125-.074c-.51-.303-.968-.663-1.362-1.073l-.087-.09c-.378-.392-.714-.813-1-1.252l-.06-.094c-.28-.44-.514-.906-.695-1.384l-.04-.107c-.177-.475-.308-.965-.39-1.457l-.018-.1c-.075-.49-.114-.987-.114-1.485 0-.506.042-1.006.124-1.49l.017-.096c.086-.5.226-.988.42-1.456l.043-.103c.192-.458.423-.9.688-1.32l.063-.102c.252-.398.545-.773.873-1.117l.088-.09c.334-.33.707-.63 1.11-.893l.105-.07c.402-.253.836-.457 1.29-.607l.13-.043c.467-.154.95-.26 1.438-.315l.105-.01z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-gray-50 p-8 rounded-2xl">
                <h3 class="font-display font-bold text-[#0B0B0F] text-2xl mb-6">Send Us a Message</h3>
                
                @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                    <p class="text-green-700">{{ session('success') }}</p>
                </div>
                @endif
                
                @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                    <ul class="text-red-600 text-sm">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                            <input type="text" name="first_name" required class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B8A878]/20 focus:border-[#B8A878]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                            <input type="text" name="last_name" required class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B8A878]/20 focus:border-[#B8A878]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" name="email" required class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B8A878]/20 focus:border-[#B8A878]">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                        <input type="tel" name="phone" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B8A878]/20 focus:border-[#B8A878]">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                        <select name="subject" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B8A878]/20 focus:border-[#B8A878]">
                            <option value="">Select a subject</option>
                            <option value="general">General Inquiry</option>
                            <option value="order">Order Related</option>
                            <option value="product">Product Question</option>
                            <option value="feedback">Feedback</option>
                            <option value="partnership">Partnership</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                        <textarea name="message" rows="4" required class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B8A878]/20 focus:border-[#B8A878] resize-none"></textarea>
                    </div>
                    <button type="submit" class="w-full px-6 py-4 bg-[#B8A878] text-[#0B0B0F] font-semibold rounded-xl hover:bg-[#D4C4A8] transition-colors">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="section bg-gray-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-[#B8A878] text-sm font-medium tracking-wider uppercase mb-3">Need Help?</span>
            <h2 class="text-3xl md:text-4xl font-display font-bold text-[#0B0B0F]">Frequently Asked Questions</h2>
        </div>
        
        <div class="space-y-4">
            <div class="bg-white p-6 rounded-xl">
                <h3 class="font-semibold text-[#0B0B0F] text-lg mb-2">How long does delivery take?</h3>
                <p class="text-gray-600">We provide fast delivery across Pakistan within 3-5 business days. International shipping takes 7-14 business days.</p>
            </div>
            <div class="bg-white p-6 rounded-xl">
                <h3 class="font-semibold text-[#0B0B0F] text-lg mb-2">What is your return policy?</h3>
                <p class="text-gray-600">We offer a 30-day hassle-free return policy. If you're not satisfied with your purchase, you can return it for a full refund.</p>
            </div>
            <div class="bg-white p-6 rounded-xl">
                <h3 class="font-semibold text-[#0B0B0F] text-lg mb-2">Are your fragrances authentic?</h3>
                <p class="text-gray-600">Yes, all our fragrances are 100% authentic. We source directly from authorized distributors and guarantee authenticity.</p>
            </div>
            <div class="bg-white p-6 rounded-xl">
                <h3 class="font-semibold text-[#0B0B0F] text-lg mb-2">Do you offer cash on delivery?</h3>
                <p class="text-gray-600">Yes, we offer cash on delivery (COD) for all orders within Pakistan. You pay when you receive your order.</p>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="h-96 bg-gray-100">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d462560.3060155465!2d55.22748445!3d25.076646449999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13!3m3!1m2!1s0x3e5f43448a34071b%3A0x6c6c5a0e3f1e6c!2sDubai%2C%20UAE!5e0!3m2!1sen!2s!4v1700000000000" 
        width="100%" 
        height="100%" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</section>
@endsection