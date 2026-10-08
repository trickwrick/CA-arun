import Navbar from '@/components/Navbar';
import Link from 'next/link';

export default function Appointment() {
  return (
    <main className="min-h-screen bg-gray-50 font-sans selection:bg-green-500 selection:text-white pb-20">
      <Navbar />

      {/* Page Header */}
      <section className="bg-[#0b1b3d] pt-32 pb-20 text-white text-center relative overflow-hidden">
        <div className="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?q=80&w=2072&auto=format&fit=crop')] bg-cover bg-center opacity-10"></div>
        <div className="relative z-10">
          <h1 className="text-4xl md:text-5xl font-extrabold mb-4">Book An Appointment</h1>
          <div className="flex items-center justify-center gap-2 text-sm text-gray-300 font-medium">
            <Link href="/" className="hover:text-green-400 transition-colors">Home</Link>
            <span>/</span>
            <span className="text-green-500">Appointment</span>
          </div>
        </div>
      </section>

      {/* Appointment Form Section */}
      <section className="py-24 bg-white relative">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex flex-col lg:flex-row gap-16 items-center">
            
            {/* Left Content */}
            <div className="w-full lg:w-1/2">
              <h2 className="text-green-500 font-bold tracking-widest uppercase mb-3 text-sm">Schedule A Meeting</h2>
              <h3 className="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">Let's Discuss Your Financial Future</h3>
              <p className="text-lg text-gray-600 mb-10 leading-relaxed">
                Whether you need advice on taxation, auditing, company formation, or strategic business planning, our Chartered Accountants are ready to help. Book a one-on-one session to explore tailored financial solutions for your business.
              </p>
              
              <div className="space-y-6">
                <div className="flex items-start gap-4">
                  <div className="w-12 h-12 bg-green-50 rounded-full flex items-center justify-center text-green-500 shrink-0">
                    <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  </div>
                  <div>
                    <h4 className="text-xl font-bold text-gray-900">Flexible Timing</h4>
                    <p className="text-gray-600 mt-1">Choose a date and time that fits your busy schedule.</p>
                  </div>
                </div>
                
                <div className="flex items-start gap-4">
                  <div className="w-12 h-12 bg-green-50 rounded-full flex items-center justify-center text-green-500 shrink-0">
                    <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                  </div>
                  <div>
                    <h4 className="text-xl font-bold text-gray-900">Expert Consultation</h4>
                    <p className="text-gray-600 mt-1">Speak directly with experienced Chartered Accountants.</p>
                  </div>
                </div>
              </div>
            </div>

            {/* Right Form */}
            <div className="w-full lg:w-1/2">
              <div className="bg-[#0b1b3d] p-10 rounded-3xl shadow-2xl relative">
                <div className="absolute top-0 right-0 w-32 h-32 bg-green-500 rounded-bl-full opacity-10"></div>
                <h3 className="text-2xl font-extrabold text-white mb-8">Book Your Slot</h3>
                
                <form className="space-y-6 relative z-10">
                  <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                      <label className="block text-sm font-bold text-gray-300 mb-2">First Name</label>
                      <input type="text" style={{ color: 'white' }} className="w-full bg-white/10 border border-gray-600 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all placeholder:text-gray-400" placeholder="John" />
                    </div>
                    <div>
                      <label className="block text-sm font-bold text-gray-300 mb-2">Last Name</label>
                      <input type="text" style={{ color: 'white' }} className="w-full bg-white/10 border border-gray-600 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all placeholder:text-gray-400" placeholder="Doe" />
                    </div>
                  </div>
                  
                  <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                      <label className="block text-sm font-bold text-gray-300 mb-2">Email Address</label>
                      <input type="email" style={{ color: 'white' }} className="w-full bg-white/10 border border-gray-600 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all placeholder:text-gray-400" placeholder="john@example.com" />
                    </div>
                    <div>
                      <label className="block text-sm font-bold text-gray-300 mb-2">Phone Number</label>
                      <input type="tel" style={{ color: 'white' }} className="w-full bg-white/10 border border-gray-600 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all placeholder:text-gray-400" placeholder="+91 90000 00000" />
                    </div>
                  </div>

                  <div>
                    <label className="block text-sm font-bold text-gray-300 mb-2">Service Required</label>
                    <select className="w-full bg-white/10 border border-gray-600 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-green-500 transition-all appearance-none cursor-pointer">
                      <option className="text-gray-900" value="audit">Audit & Assurance</option>
                      <option className="text-gray-900" value="tax">Taxation Services</option>
                      <option className="text-gray-900" value="company">Company Formation</option>
                      <option className="text-gray-900" value="advisory">Business Advisory</option>
                      <option className="text-gray-900" value="other">Other Query</option>
                    </select>
                  </div>

                  <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                      <label className="block text-sm font-bold text-gray-300 mb-2">Preferred Date</label>
                      <input type="date" className="w-full bg-white/10 border border-gray-600 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-green-500 transition-all scheme-dark" />
                    </div>
                    <div>
                      <label className="block text-sm font-bold text-gray-300 mb-2">Preferred Time</label>
                      <input type="time" className="w-full bg-white/10 border border-gray-600 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-green-500 transition-all scheme-dark" />
                    </div>
                  </div>

                  <button type="button" className="w-full bg-green-500 hover:bg-green-400 text-[#0b1b3d] font-extrabold py-4 rounded-xl transition-colors shadow-lg shadow-green-500/30 mt-4">
                    Confirm Appointment
                  </button>
                </form>
              </div>
            </div>
            
          </div>
        </div>
      </section>
    </main>
  );
}
