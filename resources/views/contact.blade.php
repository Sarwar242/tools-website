@extends('layouts.app')

@section('title', 'Contact Us - ToolHub')
@section('description', 'Contact ToolHub - Get in touch with us for support, feedback, or inquiries about our free online tools.')
@section('keywords', 'contact, support, feedback, inquiries, ToolHub')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-8 mb-6">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Contact Us</h1>
        <p class="text-gray-600 dark:text-gray-400">
            Have questions, feedback, or need support? We'd love to hear from you!
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Contact Information -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-8">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Get in Touch</h2>
            
            <div class="space-y-6">
                <!-- Email -->
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                            <i class="fas fa-envelope text-blue-600 dark:text-blue-400 text-xl"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Email</h3>
                        <a href="mailto:info@sarwar.com.bd" class="text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300">
                            info@sarwar.com.bd
                        </a>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">We typically respond within 24-48 hours</p>
                    </div>
                </div>

                <!-- Website -->
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                            <i class="fas fa-globe text-green-600 dark:text-green-400 text-xl"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Website</h3>
                        <a href="https://sarwar.com.bd" target="_blank" class="text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300">
                            sarwar.com.bd
                        </a>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Visit our portfolio and blog</p>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center">
                            <i class="fas fa-share-alt text-purple-600 dark:text-purple-400 text-xl"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Follow Us</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-2">Connect with us on social media</p>
                        <div class="flex space-x-3">
                            <a href="https://blog.sarwar.com.bd" target="_blank" class="text-gray-600 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400">
                                <i class="fas fa-blog text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-6 border-gray-200 dark:border-gray-700">

            <!-- Support Hours -->
            <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2 flex items-center">
                    <i class="fas fa-clock mr-2 text-blue-600 dark:text-blue-400"></i>
                    Support Hours
                </h3>
                <p class="text-gray-700 dark:text-gray-300">
                    We respond to all inquiries within 24-48 hours during business days.
                </p>
            </div>
        </div>

        <!-- Quick Links & FAQs -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-8">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Quick Links</h2>
            
            <div class="space-y-4 mb-8">
                <a href="{{ route('tools.dashboard') }}" class="flex items-center space-x-3 text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">
                    <i class="fas fa-tools text-blue-600 dark:text-blue-400"></i>
                    <span>Browse All Tools</span>
                </a>
                <a href="{{ route('about') }}" class="flex items-center space-x-3 text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">
                    <i class="fas fa-info-circle text-blue-600 dark:text-blue-400"></i>
                    <span>About ToolHub</span>
                </a>
                <a href="{{ route('privacy-policy') }}" class="flex items-center space-x-3 text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">
                    <i class="fas fa-shield-alt text-blue-600 dark:text-blue-400"></i>
                    <span>Privacy Policy</span>
                </a>
                <a href="{{ route('terms-of-service') }}" class="flex items-center space-x-3 text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">
                    <i class="fas fa-file-contract text-blue-600 dark:text-blue-400"></i>
                    <span>Terms of Service</span>
                </a>
            </div>

            <hr class="my-6 border-gray-200 dark:border-gray-700">

            <!-- Common Questions -->
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Common Questions</h3>
            <div class="space-y-4">
                <div>
                    <h4 class="font-semibold text-gray-900 dark:text-white mb-1">Are your tools really free?</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Yes! All our tools are completely free to use with no hidden charges.</p>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900 dark:text-white mb-1">Do you store my data?</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Most tools process data client-side. Check our Privacy Policy for details.</p>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900 dark:text-white mb-1">Can I use these tools commercially?</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Yes, our tools are free for both personal and commercial use.</p>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900 dark:text-white mb-1">How can I report a bug?</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Email us at info@sarwar.com.bd with details about the issue.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Info -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-8 mt-8">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">About ToolHub</h2>
        <p class="text-gray-700 dark:text-gray-300 mb-4">
            ToolHub is a collection of free online tools created by <strong>Sarwar Hossain</strong>, a professional web developer and software engineer. Our mission is to provide high-quality, easy-to-use utilities that help developers and professionals work more efficiently.
        </p>
        <p class="text-gray-700 dark:text-gray-300 mb-4">
            All tools are designed with privacy and security in mind. Most processing happens directly in your browser, and we never sell or share your data with third parties.
        </p>
        <div class="flex flex-wrap gap-4 mt-6">
            <a href="https://sarwar.com.bd" target="_blank" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                <i class="fas fa-user mr-2"></i>
                Visit Portfolio
            </a>
            <a href="https://blog.sarwar.com.bd" target="_blank" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors">
                <i class="fas fa-blog mr-2"></i>
                Read Blog
            </a>
        </div>
    </div>

    <!-- Back to Home -->
    <div class="mt-8 text-center">
        <a href="{{ route('tools.dashboard') }}" class="inline-flex items-center space-x-2 text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300 transition-colors">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Tools</span>
        </a>
    </div>
</div>
@endsection
