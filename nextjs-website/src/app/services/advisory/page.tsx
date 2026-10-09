import Navbar from '@/components/Navbar';
import Link from 'next/link';

export default function AdvisoryService() {
  return (
    <main className="min-h-screen bg-gray-50 font-sans selection:bg-green-500 selection:text-white pb-20">
      <Navbar />

      {/* Page Header */}
      <section className="bg-[#0b1b3d] pt-32 pb-20 text-white text-center relative overflow-hidden">
        <div className="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=2070&auto=format&fit=crop')] bg-cover bg-center opacity-10"></div>
        <div className="relative z-10">
          <h1 className="text-4xl md:text-5xl font-extrabold mb-4">Business Advisory</h1>
          <div className="flex items-center justify-center gap-2 text-sm text-gray-300 font-medium">
            <Link href="/" className="hover:text-green-400 transition-colors">Home</Link>
            <span>/</span>
            <Link href="/services" className="hover:text-green-400 transition-colors">Services</Link>
            <span>/</span>
            <span className="text-green-500">Advisory</span>
          </div>
        </div>
      </section>

      {/* Content Section */}
      <section className="py-24 bg-white relative">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex flex-col lg:flex-row gap-16">
            <div className="w-full lg:w-2/3">
              <img src="https://images.unsplash.com/photo-1553484771-371a605b060b?q=80&w=2070&auto=format&fit=crop" alt="Advisory" className="w-full h-96 object-cover rounded-3xl shadow-xl mb-10" />
              <h2 className="text-3xl font-extrabold text-gray-900 mb-6">Strategic Business Advisory Services</h2>
              <p className="text-lg text-gray-600 mb-6 leading-relaxed">
                In today’s rapidly evolving business environment, making the right strategic decisions is crucial for sustainable growth. Our Business Advisory services are designed to provide you with the insights and guidance needed to navigate complex challenges, optimize operations, and capitalize on new opportunities.
              </p>
              <p className="text-lg text-gray-600 mb-10 leading-relaxed">
                We work closely with management teams to understand their vision and provide actionable strategies. Whether you are a startup looking to scale or an established enterprise seeking restructuring, our experts offer tailored solutions.
              </p>
              
              <div className="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                <div className="bg-gray-50 p-8 rounded-2xl border border-gray-100">
                  <h3 className="text-xl font-bold text-gray-900 mb-3">Financial Modeling</h3>
                  <p className="text-gray-600">Developing robust financial models to project future performance, assess investment viability, and support strategic planning.</p>
                </div>
                <div className="bg-gray-50 p-8 rounded-2xl border border-gray-100">
                  <h3 className="text-xl font-bold text-gray-900 mb-3">Risk Management</h3>
                  <p className="text-gray-600">Identifying potential financial and operational risks and implementing strategies to mitigate them effectively.</p>
                </div>
                <div className="bg-gray-50 p-8 rounded-2xl border border-gray-100">
                  <h3 className="text-xl font-bold text-gray-900 mb-3">Business Valuation</h3>
                  <p className="text-gray-600">Providing accurate and defensible valuations for mergers, acquisitions, restructuring, and financial reporting.</p>
                </div>
                <div className="bg-gray-50 p-8 rounded-2xl border border-gray-100">
                  <h3 className="text-xl font-bold text-gray-900 mb-3">Startup Mentorship</h3>
                  <p className="text-gray-600">Guiding early-stage companies through capital structuring, regulatory compliance, and growth strategies.</p>
                </div>
              </div>
            </div>
            
            {/* Sidebar */}
            <div className="w-full lg:w-1/3">
              <div className="bg-[#0b1b3d] rounded-3xl p-8 text-white sticky top-32 shadow-2xl">
                <h3 className="text-2xl font-bold mb-6">Need Expert Advice?</h3>
                <p className="text-gray-300 mb-8">Schedule a consultation with our advisory team to discuss your business goals.</p>
                <Link href="/contact" className="block w-full bg-green-500 hover:bg-green-600 text-center text-white font-bold py-4 rounded-xl transition-colors shadow-lg shadow-green-500/30">
                  Contact Us Now
                </Link>
                
                <hr className="border-gray-700 my-8" />
                
                <h4 className="font-bold mb-4 text-lg">Other Services</h4>
                <ul className="space-y-3">
                  <li><Link href="/services/audit" className="text-gray-400 hover:text-green-400 transition-colors flex items-center"><svg className="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 5l7 7-7 7"></path></svg> Audit & Assurance</Link></li>
                  <li><Link href="/services/company" className="text-gray-400 hover:text-green-400 transition-colors flex items-center"><svg className="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 5l7 7-7 7"></path></svg> Company Formation</Link></li>
                  <li><Link href="/services" className="text-gray-400 hover:text-green-400 transition-colors flex items-center"><svg className="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 5l7 7-7 7"></path></svg> Taxation</Link></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  );
}
