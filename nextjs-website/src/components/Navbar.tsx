import Link from 'next/link';

export default function Navbar() {
  return (
    <nav className="bg-white text-gray-900 shadow-xl sticky top-0 z-50">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex justify-between h-20 items-center">
          <div className="shrink-0 flex items-center">
            <Link href="/" className="flex flex-col items-center">
              <img src="/logo.png" alt="Agrawal Goyanka & Co." className="h-12 w-auto" />
            </Link>
          </div>
          <div className="hidden md:flex space-x-10 items-center">
            <Link href="/" className="hover:text-green-500 transition-colors px-2 py-2 font-semibold text-sm uppercase tracking-wider text-gray-700">Home</Link>
            <Link href="/about" className="hover:text-green-500 transition-colors px-2 py-2 font-semibold text-sm uppercase tracking-wider text-gray-700">About Us</Link>
            
            <div className="relative group">
              <button className="hover:text-green-500 transition-colors px-2 py-2 font-semibold text-sm uppercase tracking-wider flex items-center text-gray-700">
                Services
                <svg className="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 9l-7 7-7-7"></path></svg>
              </button>
              <div className="absolute left-0 mt-2 w-64 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 bg-white text-gray-800 rounded-b-lg shadow-2xl py-2 border-t-4 border-green-500">
                <Link href="/services/tax" className="block px-6 py-3 hover:bg-gray-50 hover:text-green-600 font-medium transition-colors">Income Tax & GST</Link>
                <Link href="/services/audit" className="block px-6 py-3 hover:bg-gray-50 hover:text-green-600 font-medium transition-colors">Audit & Assurance</Link>
                <Link href="/services/company" className="block px-6 py-3 hover:bg-gray-50 hover:text-green-600 font-medium transition-colors">Company Registration</Link>
                <Link href="/services/advisory" className="block px-6 py-3 hover:bg-gray-50 hover:text-green-600 font-medium transition-colors">Financial Advisory</Link>
              </div>
            </div>
            
            <Link href="/contact" className="hover:text-green-500 transition-colors px-2 py-2 font-semibold text-sm uppercase tracking-wider text-gray-700">Contact</Link>
            
            <Link href="/appointment" className="bg-[#0b1b3d] hover:bg-green-500 text-white px-6 py-3 rounded-full font-bold transition-all transform hover:scale-105 shadow-lg">
              Get Free Consultation
            </Link>
          </div>
          <div className="md:hidden flex items-center">
            <button className="text-gray-900 hover:text-green-500 focus:outline-none">
              <svg className="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </nav>
  );
}
