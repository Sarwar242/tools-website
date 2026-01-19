@extends('layouts.app')

@section('title', 'Terms of Service - ToolHub')
@section('description', 'Terms of Service for ToolHub - Read our terms and conditions for using our free online tools and services.')
@section('keywords', 'terms of service, terms and conditions, user agreement, ToolHub')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-8 mb-6">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Terms of Service</h1>
        <p class="text-gray-600 dark:text-gray-400">
            <strong>Last Updated:</strong> January 13, 2026
        </p>
    </div>

    <!-- Content -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-8 prose prose-lg dark:prose-invert max-w-none">
        
        <h2>1. Agreement to Terms</h2>
        <p>
            Welcome to ToolHub ("we," "our," or "us"). These Terms of Service ("Terms") govern your access to and use of our website <strong>webtools.sarwar.com.bd</strong> and all related services, tools, and features (collectively, the "Services").
        </p>
        <p>
            By accessing or using our Services, you agree to be bound by these Terms. If you disagree with any part of these Terms, you may not access or use our Services.
        </p>

        <h2>2. Description of Services</h2>
        <p>
            ToolHub provides free online tools for developers and professionals, including but not limited to:
        </p>
        <ul>
            <li>QR Code Generator</li>
            <li>JSON Formatter & Validator</li>
            <li>Password Generator</li>
            <li>Base64 Encoder/Decoder</li>
            <li>Hash Generator (MD5, SHA-1, SHA-256, SHA-512)</li>
            <li>Text Case Converter</li>
            <li>URL Encoder/Decoder</li>
            <li>Sitemap Generator</li>
        </ul>
        <p>
            All tools are provided free of charge for personal and commercial use, subject to these Terms.
        </p>

        <h2>3. User Responsibilities</h2>
        
        <h3>3.1 Acceptable Use</h3>
        <p>You agree to use our Services only for lawful purposes and in accordance with these Terms. You agree NOT to:</p>
        <ul>
            <li>Use the Services in any way that violates any applicable law or regulation</li>
            <li>Transmit or procure the sending of any advertising or promotional material without our prior written consent</li>
            <li>Impersonate or attempt to impersonate ToolHub, a ToolHub employee, another user, or any other person or entity</li>
            <li>Engage in any conduct that restricts or inhibits anyone's use or enjoyment of the Services</li>
            <li>Use any automated system to access the Services in a manner that sends more request messages to our servers than a human can reasonably produce in the same period</li>
            <li>Introduce any viruses, trojan horses, worms, logic bombs, or other malicious or technologically harmful material</li>
            <li>Attempt to gain unauthorized access to any portion of the Services or any other systems or networks connected to the Services</li>
            <li>Use the Services to create, distribute, or promote illegal, harmful, or offensive content</li>
        </ul>

        <h3>3.2 Prohibited Content</h3>
        <p>When using our Services, you must NOT input, generate, or create content that is:</p>
        <ul>
            <li>Illegal, harmful, threatening, abusive, harassing, defamatory, vulgar, obscene, or otherwise objectionable</li>
            <li>Infringes any patent, trademark, trade secret, copyright, or other proprietary rights</li>
            <li>Contains software viruses or any other malicious code</li>
            <li>Promotes illegal activities or violence</li>
            <li>Violates the privacy or publicity rights of others</li>
            <li>Contains adult content, including pornography or sexually explicit material</li>
            <li>Promotes discrimination based on race, sex, religion, nationality, disability, sexual orientation, or age</li>
        </ul>

        <h2>4. Intellectual Property Rights</h2>
        
        <h3>4.1 Our Intellectual Property</h3>
        <p>
            The Services and their entire contents, features, and functionality (including but not limited to all information, software, text, displays, images, video, and audio, and the design, selection, and arrangement thereof) are owned by ToolHub, its licensors, or other providers of such material and are protected by copyright, trademark, patent, trade secret, and other intellectual property laws.
        </p>

        <h3>4.2 Your Content</h3>
        <p>
            You retain all ownership rights to content you input into our tools. By using our Services, you grant us a limited, non-exclusive, royalty-free license to process your content solely to provide the Services.
        </p>
        <p>
            For example, when you use our tools, we may temporarily process your data to provide the service. We do not claim ownership of your data.
        </p>

        <h3>4.3 Attribution</h3>
        <p>
            While not required, we appreciate attribution when you use outputs from our tools in your projects or publications.
        </p>

        <h2>5. User Accounts and Registration</h2>
        <p>
            Currently, our Services do not require user registration. If we introduce user accounts in the future, additional terms will apply.
        </p>

        <h2>6. Privacy and Data Protection</h2>
        <p>
            Your use of our Services is also governed by our <a href="{{ route('privacy-policy') }}" class="text-blue-600 hover:text-blue-500">Privacy Policy</a>. Please review our Privacy Policy to understand how we collect, use, and protect your information.
        </p>

        <h2>7. Third-Party Services and Links</h2>
        <p>
            Our Services may contain links to third-party websites or services that are not owned or controlled by ToolHub. We have no control over, and assume no responsibility for, the content, privacy policies, or practices of any third-party websites or services.
        </p>
        <p>
            <strong>Third-party services we use include:</strong>
        </p>
        <ul>
            <li><strong>Google AdSense:</strong> For displaying advertisements</li>
            <li><strong>Google Analytics:</strong> For website analytics</li>
            <li><strong>Font Awesome:</strong> For icons</li>
            <li><strong>CDN Providers:</strong> For content delivery</li>
        </ul>

        <h2>8. Advertising</h2>
        <p>
            We display advertisements through Google AdSense on our Services. These advertisements help us keep our tools free for everyone.
        </p>
        <p>
            <strong>Important Rules:</strong>
        </p>
        <ul>
            <li>Do not click on ads with the intent to support us (this is against AdSense policies)</li>
            <li>Do not encourage others to click on ads</li>
            <li>Do not use automated systems to click on ads</li>
            <li>Do not modify or interfere with ads in any way</li>
        </ul>

        <h2>9. Disclaimer of Warranties</h2>
        <p>
            <strong>THE SERVICES ARE PROVIDED "AS IS" AND "AS AVAILABLE" WITHOUT WARRANTIES OF ANY KIND, EITHER EXPRESS OR IMPLIED.</strong>
        </p>
        <p>
            We do not warrant that:
        </p>
        <ul>
            <li>The Services will function uninterrupted, secure, or error-free</li>
            <li>Any defects or errors will be corrected</li>
            <li>The Services or the servers are free of viruses or other harmful components</li>
            <li>The results of using the Services will meet your requirements</li>
        </ul>
        <p>
            <strong>Important Tool-Specific Disclaimers:</strong>
        </p>
        <ul>
            <li><strong>Password Generator:</strong> While we generate strong passwords, we cannot guarantee absolute security. Use at your own discretion.</li>
            <li><strong>Hash Generator:</strong> Cryptographic outputs are provided as-is. We are not responsible for misuse or security breaches.</li>
            <li><strong>QR Codes:</strong> We are not responsible for how QR codes are used or where they redirect.</li>
        </ul>

        <h2>10. Limitation of Liability</h2>
        <p>
            <strong>TO THE MAXIMUM EXTENT PERMITTED BY LAW, TOOLHUB SHALL NOT BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, OR PUNITIVE DAMAGES, OR ANY LOSS OF PROFITS OR REVENUES, WHETHER INCURRED DIRECTLY OR INDIRECTLY, OR ANY LOSS OF DATA, USE, GOODWILL, OR OTHER INTANGIBLE LOSSES.</strong>
        </p>
        <p>
            This includes but is not limited to:
        </p>
        <ul>
            <li>Data loss or corruption</li>
            <li>Business interruption</li>
            <li>Security breaches from generated passwords or hashes</li>
            <li>Errors in tool outputs</li>
            <li>Malicious content accessed through shortened URLs</li>
        </ul>

        <h2>11. Indemnification</h2>
        <p>
            You agree to defend, indemnify, and hold harmless ToolHub, its affiliates, licensors, and service providers from any claims, liabilities, damages, judgments, awards, losses, costs, expenses, or fees (including reasonable attorneys' fees) arising out of:
        </p>
        <ul>
            <li>Your violation of these Terms</li>
            <li>Your use of the Services</li>
            <li>Your violation of any third-party rights</li>
            <li>Any content you input into our tools</li>
        </ul>

        <h2>12. Service Availability and Modifications</h2>
        
        <h3>12.1 Service Availability</h3>
        <p>
            We strive to maintain 99% uptime, but we do not guarantee that our Services will always be available, uninterrupted, or error-free. We may suspend or discontinue any part of the Services at any time without notice.
        </p>

        <h3>12.2 Modifications to Services</h3>
        <p>
            We reserve the right to modify, suspend, or discontinue any aspect of the Services at any time, including:
        </p>
        <ul>
            <li>Adding or removing tools</li>
            <li>Changing tool features or functionality</li>
            <li>Implementing usage limits or restrictions</li>
            <li>Introducing paid features or premium tiers</li>
        </ul>

        <h2>13. Termination</h2>
        <p>
            We may terminate or suspend your access to our Services immediately, without prior notice or liability, for any reason, including if you breach these Terms.
        </p>
        <p>
            Upon termination, your right to use the Services will immediately cease. If you wish to terminate your use of the Services, simply discontinue using them.
        </p>

        <h2>14. Usage Limits and Fair Use</h2>
        <p>
            To ensure fair access for all users, we may implement the following restrictions:
        </p>
        <ul>
            <li><strong>Rate Limiting:</strong> Maximum requests per minute/hour/day</li>
            <li><strong>Data Size Limits:</strong> Maximum file sizes or input lengths</li>
            <li><strong>Storage Limits:</strong> URL shortener may have retention limits</li>
        </ul>
        <p>
            Excessive or abusive usage may result in temporary or permanent suspension of access.
        </p>

        <h2>15. Geographic Restrictions</h2>
        <p>
            Our Services are provided from Bangladesh and intended for users worldwide. However, we make no claims that the Services are appropriate or available for use in all locations.
        </p>
        <p>
            Those who access or use the Services from other jurisdictions do so at their own risk and are responsible for compliance with local laws.
        </p>

        <h2>16. Dispute Resolution</h2>
        
        <h3>16.1 Governing Law</h3>
        <p>
            These Terms shall be governed by and construed in accordance with the laws of Bangladesh, without regard to its conflict of law provisions.
        </p>

        <h3>16.2 Dispute Resolution Process</h3>
        <p>
            If you have any concerns or disputes about the Services, please contact us first at <strong>info@sarwar.com.bd</strong>. We will attempt to resolve disputes informally and in good faith.
        </p>

        <h2>17. Changes to Terms of Service</h2>
        <p>
            We reserve the right to modify or replace these Terms at any time at our sole discretion. If a revision is material, we will provide at least 30 days' notice prior to any new terms taking effect.
        </p>
        <p>
            By continuing to access or use our Services after revisions become effective, you agree to be bound by the revised terms.
        </p>

        <h2>18. Severability</h2>
        <p>
            If any provision of these Terms is held to be unenforceable or invalid, such provision will be changed and interpreted to accomplish the objectives of such provision to the greatest extent possible under applicable law, and the remaining provisions will continue in full force and effect.
        </p>

        <h2>19. Waiver</h2>
        <p>
            No waiver by ToolHub of any term or condition set forth in these Terms shall be deemed a further or continuing waiver of such term or condition or a waiver of any other term or condition.
        </p>

        <h2>20. Entire Agreement</h2>
        <p>
            These Terms, together with our Privacy Policy, constitute the entire agreement between you and ToolHub regarding the Services and supersede all prior agreements and understandings.
        </p>

        <h2>21. Contact Information</h2>
        <p>
            If you have any questions about these Terms of Service, please contact us:
        </p>
        <div class="bg-gray-50 dark:bg-gray-900 p-6 rounded-lg mt-4">
            <p><strong>ToolHub - Free Online Tools</strong></p>
            <p><strong>Email:</strong> info@sarwar.com.bd</p>
            <p><strong>Website:</strong> <a href="https://webtools.sarwar.com.bd" class="text-blue-600 hover:text-blue-500">webtools.sarwar.com.bd</a></p>
            <p><strong>Portfolio:</strong> <a href="https://sarwar.com.bd" class="text-blue-600 hover:text-blue-500">sarwar.com.bd</a></p>
        </div>

        <hr class="my-8">

        <h2>22. Acknowledgment</h2>
        <p>
            BY USING OUR SERVICES, YOU ACKNOWLEDGE THAT YOU HAVE READ THESE TERMS OF SERVICE AND AGREE TO BE BOUND BY THEM.
        </p>

        <div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500 p-6 mt-8">
            <p class="text-sm text-gray-700 dark:text-gray-300">
                <strong>📌 Note:</strong> These Terms of Service are effective as of January 13, 2026. Continued use of our Services after any modifications constitutes acceptance of the updated Terms.
            </p>
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
