import Navbar from '@/components/Navbar';
import Link from 'next/link';

export default function CompanyService() {
  return (
    <main className="min-h-screen bg-gray-50 font-sans selection:bg-green-500 selection:text-white pb-20">
      <Navbar />

      {/* Page Header */}
      <section className="bg-[#0b1b3d] pt-32 pb-20 text-white text-center relative overflow-hidden">
        <div className="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2069&auto=format&fit=crop')] bg-cover bg-center opacity-10"></div>
        <div className="relative z-10">
          <h1 className="text-4xl md:text-5xl font-extrabold mb-4">Company Formation</h1>
          <div className="flex items-center justify-center gap-2 text-sm text-gray-300 font-medium">
            <Link href="/" className="hover:text-green-400 transition-colors">Home</Link>
            <span>/</span>
            <Link href="/services" className="hover:text-green-400 transition-colors">Services</Link>
            <span>/</span>
            <span className="text-green-500">Company</span>
          </div>
        </div>
      </section>

      {/* Content Section */}
      <section className="py-24 bg-white relative">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex flex-col lg:flex-row gap-16">
            <div className="w-full lg:w-2/3">
              <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?q=80&w=2070&auto=format&fit=crop" alt="Company Formation" className="w-full h-96 object-cover rounded-3xl shadow-xl mb-10" />
              <h2 className="text-3xl font-extrabold text-gray-900 mb-6">Seamless Registration & Incorporation</h2>
              <p className="text-lg text-gray-600 mb-6 leading-relaxed">
                Starting a new business is an exciting venture, but the legal and regulatory processes can be overwhelming. Our Company Formation and Registration services simplify the process, ensuring your new business is legally compliant from day one.
              </p>
              <p className="text-lg text-gray-600 mb-10 leading-relaxed">
                We assist entrepreneurs and corporate entities in choosing the right business structure and handling all necessary documentation, filings, and registrations with government authorities.
              </p>
              
              <div className="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                <div className="bg-gray-50 p-8 rounded-2xl border border-gray-100">
                  <h3 className="text-xl font-bold text-gray-900 mb-3">Entity Selection</h3>
                  <p className="text-gray-600">Advisory on choosing between Private Limited, LLP, Partnership, or Proprietorship based on your goals.</p>
                </div>
                <div className="bg-gray-50 p-8 rounded-2xl border border-gray-100">
                  <h3 className="text-xl font-bold text-gray-900 mb-3">Incorporation Filings</h3>
                  <p className="text-gray-600">End-to-end assistance in filing documents with the Ministry of Corporate Affairs (MCA).</p>
                </div>
                <div className="bg-gray-50 p-8 rounded-2xl border border-gray-100">
                  <h3 className="text-xl font-bold text-gray-900 mb-3">Statutory Registrations</h3>
                  <p className="text-gray-600">Acquiring PAN, TAN, GST registration, MSME certificates, and other required licenses.</p>
                </div>
                <div className="bg-gray-50 p-8 rounded-2xl border border-gray-100">
                  <h3 className="text-xl font-bold text-gray-900 mb-3">Post-Incorporation</h3>
                  <p className="text-gray-600">Assistance with bank account opening, initial statutory compliance, and auditor appointment.</p>
                </div>
              </div>
            </div>
            
            {/* Sidebar */}
            <div className="w-full lg:w-1/3">
              <div className="bg-[#0b1b3d] rounded-3xl p-8 text-white sticky top-32 shadow-2xl">
                <h3 className="text-2xl font-bold mb-6">Start Your Journey</h3>
                <p className="text-gray-300 mb-8">Ready to register your company? Let our experts handle the paperwork.</p>
                <Link href="/contact" className="block w-full bg-green-500 hover:bg-green-600 text-center text-white font-bold py-4 rounded-xl transition-colors shadow-lg shadow-green-500/30">
                  Get Started Today
                </Link>
                
                <hr className="border-gray-700 my-8" />
                
                <h4 className="font-bold mb-4 text-lg">Other Services</h4>
                <ul className="space-y-3">
                  <li><Link href="/services/audit" className="text-gray-400 hover:text-green-400 transition-colors flex items-center"><svg className="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 5l7 7-7 7"></path></svg> Audit & Assurance</Link></li>
                  <li><Link href="/services/advisory" className="text-gray-400 hover:text-green-400 transition-colors flex items-center"><svg className="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 5l7 7-7 7"></path></svg> Business Advisory</Link></li>
                  <li><Link href="/services" className="text-gray-400 hover:text-green-400 transition-colors flex items-center"><svg className="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 5l7 7-7 7"></path></svg> View All Services</Link></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  );
}
