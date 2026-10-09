"use client";

import { useState } from 'react';
import Link from 'next/link';

export default function Navbar() {
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);
  const [isServicesOpen, setIsServicesOpen] = useState(false);

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
            <button 
              onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
              className="text-gray-900 hover:text-green-500 focus:outline-none p-2"
            >
              <svg className="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                {isMobileMenuOpen ? (
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12" />
                ) : (
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16M4 18h16" />
                )}
              </svg>
            </button>
          </div>
        </div>
      </div>

      {/* Mobile Menu */}
      {isMobileMenuOpen && (
        <div className="md:hidden bg-white border-t border-gray-200 shadow-xl absolute w-full left-0">
          <div className="px-4 pt-2 pb-6 space-y-1">
            <Link href="/" onClick={() => setIsMobileMenuOpen(false)} className="block px-3 py-3 rounded-md text-base font-semibold text-gray-700 hover:text-green-500 hover:bg-gray-50">Home</Link>
            <Link href="/about" onClick={() => setIsMobileMenuOpen(false)} className="block px-3 py-3 rounded-md text-base font-semibold text-gray-700 hover:text-green-500 hover:bg-gray-50">About Us</Link>
            
            <div className="space-y-1">
              <button 
                onClick={() => setIsServicesOpen(!isServicesOpen)}
                className="w-full text-left px-3 py-3 rounded-md text-base font-semibold text-gray-700 hover:text-green-500 hover:bg-gray-50 flex justify-between items-center"
              >
                Services
                <svg className={`w-4 h-4 transform transition-transform duration-200 ${isServicesOpen ? 'rotate-180' : ''}`} fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 9l-7 7-7-7"></path></svg>
              </button>
              
              {isServicesOpen && (
                <div className="pl-6 pr-3 py-2 space-y-2 border-l-2 border-green-500 ml-4">
                  <Link href="/services/tax" onClick={() => setIsMobileMenuOpen(false)} className="block py-2 text-sm font-medium text-gray-600 hover:text-green-500">Income Tax & GST</Link>
                  <Link href="/services/audit" onClick={() => setIsMobileMenuOpen(false)} className="block py-2 text-sm font-medium text-gray-600 hover:text-green-500">Audit & Assurance</Link>
                  <Link href="/services/company" onClick={() => setIsMobileMenuOpen(false)} className="block py-2 text-sm font-medium text-gray-600 hover:text-green-500">Company Registration</Link>
                  <Link href="/services/advisory" onClick={() => setIsMobileMenuOpen(false)} className="block py-2 text-sm font-medium text-gray-600 hover:text-green-500">Financial Advisory</Link>
                </div>
              )}
            </div>

            <Link href="/contact" onClick={() => setIsMobileMenuOpen(false)} className="block px-3 py-3 rounded-md text-base font-semibold text-gray-700 hover:text-green-500 hover:bg-gray-50">Contact</Link>
            
            <div className="mt-6 px-3">
              <Link href="/appointment" onClick={() => setIsMobileMenuOpen(false)} className="block w-full text-center bg-[#0b1b3d] hover:bg-green-500 text-white px-6 py-3 rounded-md font-bold transition-colors shadow-lg">
                Get Free Consultation
              </Link>
            </div>
          </div>
        </div>
      )}
    </nav>
  );
}
