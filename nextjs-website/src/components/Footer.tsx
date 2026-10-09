import Link from 'next/link';

export default function Footer() {
  return (
    <footer className="bg-[#0b1b3d] text-white pt-16 pb-8 border-t border-gray-800">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
          
          {/* Services */}
          <div>
            <h5 className="text-xl font-bold mb-6">Services</h5>
            <ul className="space-y-3">
              <li>
                <Link href="/services/company" className="text-gray-300 hover:text-green-500 transition-colors flex items-center gap-2">
                  <span className="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                  Accounting Services
                </Link>
              </li>
              <li>
                <Link href="/services/tax" className="text-gray-300 hover:text-green-500 transition-colors flex items-center gap-2">
                  <span className="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                  Taxation Services
                </Link>
              </li>
              <li>
                <Link href="/services/audit" className="text-gray-300 hover:text-green-500 transition-colors flex items-center gap-2">
                  <span className="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                  Audit & Assurance
                </Link>
              </li>
              <li>
                <Link href="/services/advisory" className="text-gray-300 hover:text-green-500 transition-colors flex items-center gap-2">
                  <span className="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                  Financial Consultancy
                </Link>
              </li>
              <li>
                <Link href="/services/company" className="text-gray-300 hover:text-green-500 transition-colors flex items-center gap-2">
                  <span className="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                  Corporate Law Services
                </Link>
              </li>
            </ul>
          </div>

          {/* Other Pages */}
          <div>
            <h5 className="text-xl font-bold mb-6">Other Pages</h5>
            <ul className="space-y-3">
              <li>
                <Link href="/about" className="text-gray-300 hover:text-green-500 transition-colors flex items-center gap-2">
                  <span className="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                  About Us
                </Link>
              </li>
              <li>
                <Link href="/contact" className="text-gray-300 hover:text-green-500 transition-colors flex items-center gap-2">
                  <span className="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                  Contact Us
                </Link>
              </li>
              <li>
                <Link href="/privacy" className="text-gray-300 hover:text-green-500 transition-colors flex items-center gap-2">
                  <span className="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                  Privacy and Policy
                </Link>
              </li>
              <li>
                <Link href="/terms" className="text-gray-300 hover:text-green-500 transition-colors flex items-center gap-2">
                  <span className="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                  Terms & conditions
                </Link>
              </li>
            </ul>
          </div>

          {/* Connect with us */}
          <div>
            <h5 className="text-xl font-bold mb-6">Connect with us</h5>
            <p className="text-gray-400 mb-6 text-sm leading-relaxed">
              Subscribe to our newsletter today to receive updates on the latest news, releases and special offers.
            </p>
            <form className="flex flex-col sm:flex-row gap-2">
              <input 
                type="email" 
                placeholder="Email Address" 
                className="bg-gray-800/50 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 w-full"
                required
              />
              <button 
                type="submit" 
                className="bg-transparent hover:bg-green-500 text-white font-bold py-3 px-6 rounded-lg transition-colors border-2 border-transparent"
              >
                Subscribe
              </button>
            </form>
          </div>

          {/* Get in touch */}
          <div>
            <h5 className="text-xl font-bold mb-6">Get in touch</h5>
            <div className="flex gap-4">
              <a href="#" className="w-10 h-10 rounded-full bg-gray-800/50 flex items-center justify-center hover:bg-green-500 transition-colors text-gray-400 hover:text-white">
                <svg className="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fillRule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clipRule="evenodd" />
                </svg>
              </a>
              <a href="#" className="w-10 h-10 rounded-full bg-gray-800/50 flex items-center justify-center hover:bg-green-500 transition-colors text-gray-400 hover:text-white">
                <svg className="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                </svg>
              </a>
              <a href="#" className="w-10 h-10 rounded-full bg-gray-800/50 flex items-center justify-center hover:bg-green-500 transition-colors text-gray-400 hover:text-white">
                <svg className="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fillRule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clipRule="evenodd" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>

      {/* Bottom Bar */}
      <div className="bg-[#1a233a] py-6 border-t border-gray-800">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-gray-400">
            <p>Copyright © 2025 Agrawal Goyanka & CO. All Rights Reserved</p>
            <div className="flex items-center gap-6">
              <Link href="/faq" className="hover:text-green-500 transition-colors">FAQ</Link>
              <Link href="/privacy" className="hover:text-green-500 transition-colors">Privacy Policy</Link>
            </div>
          </div>
        </div>
      </div>
    </footer>
  );
}
