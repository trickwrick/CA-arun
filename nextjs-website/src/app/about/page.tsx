import Navbar from '@/components/Navbar';
import Link from 'next/link';

export default function About() {
  return (
    <main className="min-h-screen bg-gray-50 font-sans selection:bg-green-500 selection:text-white pb-20">
      <Navbar />

      {/* Page Header */}
      <section className="bg-[#0b1b3d] pt-32 pb-20 text-white text-center">
        <h1 className="text-4xl md:text-5xl font-extrabold mb-4">About Us</h1>
        <div className="flex items-center justify-center gap-2 text-sm text-gray-300 font-medium">
          <Link href="/" className="hover:text-green-400 transition-colors">Home</Link>
          <span>/</span>
          <span className="text-green-500">About</span>
        </div>
      </section>

      {/* Main About Section */}
      <section className="py-24 bg-white overflow-hidden">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex flex-col lg:flex-row items-center gap-16">
            <div className="w-full lg:w-1/2 relative">
              <div className="relative rounded-3xl overflow-hidden shadow-2xl aspect-4/3">
                <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=2070&auto=format&fit=crop" alt="Accounting Team" className="w-full h-full object-cover" />
                <div className="absolute inset-0 bg-linear-to-tr from-[#0b1b3d]/60 to-transparent"></div>
              </div>
              <div className="absolute -bottom-8 -right-8 bg-white p-6 rounded-2xl shadow-xl flex items-center gap-4 border border-gray-100">
                <div className="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center text-white">
                  <span className="text-2xl font-black">31</span>
                </div>
                <div>
                  <p className="text-gray-500 text-sm font-bold uppercase tracking-wider">Years of</p>
                  <p className="text-gray-900 text-xl font-bold">Experience</p>
                </div>
              </div>
            </div>
            
            <div className="w-full lg:w-1/2 mt-12 lg:mt-0">
              <h2 className="text-green-500 font-bold tracking-widest uppercase mb-3 text-sm">About Us</h2>
              <h3 className="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">Clarity in Accounting, Confidence in Business</h3>
              <p className="text-lg text-gray-600 mb-8 leading-relaxed">
                "Agrawal Goyanka & Co. is a trusted Chartered Accountancy firm offering expert services in auditing, taxation, financial consulting, and business advisory. We provide tailored solutions to individuals and businesses, ensuring compliance, strategic growth, and financial stability with a focus on integrity, professionalism, and long-term client relationships."
              </p>
              
              <div className="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                <div className="flex items-center gap-3">
                  <div className="w-8 h-8 rounded-full bg-green-50 flex items-center justify-center text-green-500">
                    <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg>
                  </div>
                  <span className="font-bold text-gray-900">Valuation Services</span>
                </div>
                <div className="flex items-center gap-3">
                  <div className="w-8 h-8 rounded-full bg-green-50 flex items-center justify-center text-green-500">
                    <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg>
                  </div>
                  <span className="font-bold text-gray-900">Financial Models</span>
                </div>
              </div>
              
              <div className="flex items-center gap-6 p-6 bg-gray-50 rounded-2xl border border-gray-100">
                <div className="w-14 h-14 bg-gray-200 rounded-full overflow-hidden shrink-0 border-2 border-green-500">
                  <img src="/CA Arun Kumar Agarwal.jpeg" alt="CA Arun Kumar Agarwal" className="w-full h-full object-cover" />
                </div>
                <div>
                  <p className="text-gray-500 text-sm font-medium">Founder</p>
                  <p className="text-xl font-bold text-gray-900">CA Arun Kumar Agarwal</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Stats & Info Section */}
      <section className="py-24 bg-gray-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex flex-col lg:flex-row items-center gap-16">
            <div className="w-full lg:w-1/2">
              <h2 className="text-green-500 font-bold tracking-widest uppercase mb-3 text-sm">Who We Are</h2>
              <h3 className="text-4xl font-extrabold text-gray-900 mb-6 leading-tight">Guiding Your Financial Future with Expertise</h3>
              <p className="text-lg text-gray-600 mb-10 leading-relaxed">
                Pellentesque porttitor felis eu nunc feugiat, nec condimentum magna ultricies. Nam vitae est accumsan nunc. We believe in providing robust financial guidance that stands the test of time, adapting to changing market conditions and regulatory environments.
              </p>
              
              <div className="flex gap-12">
                <div>
                  <h4 className="text-5xl font-black text-[#0b1b3d] mb-2">5<span className="text-green-500">k+</span></h4>
                  <p className="text-gray-600 font-medium">Projects Completed</p>
                </div>
                <div>
                  <h4 className="text-5xl font-black text-[#0b1b3d] mb-2">5<span className="text-green-500">k+</span></h4>
                  <p className="text-gray-600 font-medium">Happy Customers</p>
                </div>
              </div>
            </div>
            
            <div className="w-full lg:w-1/2">
               <div className="grid grid-cols-2 gap-4">
                  <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?q=80&w=2072&auto=format&fit=crop" className="rounded-2xl shadow-md w-full h-64 object-cover" alt="Finance 1" />
                  <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=2015&auto=format&fit=crop" className="rounded-2xl shadow-md w-full h-64 object-cover mt-8" alt="Finance 2" />
               </div>
            </div>
          </div>
        </div>
      </section>

      {/* CTA Banner */}
      <section className="py-20 bg-[#0b1b3d] relative overflow-hidden">
        <div className="absolute inset-0 z-0 opacity-20">
          <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32d7?q=80&w=1932&auto=format&fit=crop" className="w-full h-full object-cover" alt="bg" />
        </div>
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col md:flex-row items-center justify-between">
          <h2 className="text-3xl md:text-4xl font-extrabold text-white mb-8 md:mb-0 max-w-2xl leading-tight">
            Implement solutions & Achieve your financial goals.
          </h2>
          <Link href="/contact" className="bg-green-500 hover:bg-green-400 text-white px-8 py-4 rounded-full font-bold text-lg transition-all shadow-lg shadow-green-500/30 shrink-0">
            Get Free Consultation
          </Link>
        </div>
      </section>

      {/* History Timeline */}
      <section className="py-24 bg-white">
        <div className="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <h2 className="text-green-500 font-bold tracking-widest uppercase mb-3 text-sm">Our History</h2>
          <h3 className="text-4xl font-extrabold text-gray-900 mb-16">How We Started</h3>
          
          <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
            {[
              { year: '2015', title: 'Start Company', desc: 'Empowering lives through transformative solutions.' },
              { year: '2017', title: 'Opening Office', desc: 'New office, endless opportunities, bridging distances.' },
              { year: '2020', title: 'Best Agency', desc: 'Excellence in every service, trusted by all.' },
              { year: '2023', title: 'Winning Award', desc: 'Recognized for our continued dedication.' },
            ].map((item, idx) => (
              <div key={idx} className="relative group">
                <div className="text-5xl font-black text-gray-100 mb-4 group-hover:text-green-50 transition-colors">{item.year}</div>
                <h4 className="text-xl font-bold text-gray-900 mb-2 relative z-10">{item.title}</h4>
                <p className="text-gray-600 text-sm relative z-10">{item.desc}</p>
                <div className="w-3 h-3 bg-green-500 rounded-full mx-auto mt-6 shadow-[0_0_0_4px_rgba(34,197,94,0.2)]"></div>
              </div>
            ))}
          </div>
        </div>
      </section>
    </main>
  );
}
