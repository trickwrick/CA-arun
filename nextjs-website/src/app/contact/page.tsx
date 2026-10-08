import Navbar from '@/components/Navbar';
import Link from 'next/link';

export default function Contact() {
  return (
    <main className="min-h-screen bg-gray-50 font-sans selection:bg-green-500 selection:text-white pb-20">
      <Navbar />

      {/* Page Header */}
      <section className="bg-[#0b1b3d] pt-32 pb-20 text-white text-center relative overflow-hidden">
        <div className="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1423666639041-f56000c27a9a?q=80&w=2074&auto=format&fit=crop')] bg-cover bg-center opacity-10"></div>
        <div className="relative z-10">
          <h1 className="text-4xl md:text-5xl font-extrabold mb-4">Contact Us</h1>
          <div className="flex items-center justify-center gap-2 text-sm text-gray-300 font-medium">
            <Link href="/" className="hover:text-green-400 transition-colors">Home</Link>
            <span>/</span>
            <span className="text-green-500">Contact</span>
          </div>
        </div>
      </section>

      <section className="py-24 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-16">
            
            {/* Contact Info */}
            <div>
              <h2 className="text-green-500 font-bold tracking-widest uppercase mb-3 text-sm">Get In Touch</h2>
              <h3 className="text-4xl font-extrabold text-gray-900 mb-6">Have Any Questions?</h3>
              <p className="text-gray-600 mb-10 text-lg leading-relaxed">
                Whether you need assistance with tax filing, auditing, or strategic business advice, our team of qualified professionals is here to help you 24/7.
              </p>
              
              <div className="space-y-8">
                {/* Phone */}
                <div className="flex items-start gap-6">
                  <div className="w-14 h-14 bg-green-50 rounded-xl flex items-center justify-center text-green-500 shrink-0">
                    <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                  </div>
                  <div>
                    <h4 className="text-xl font-bold text-gray-900 mb-1">Phone Number</h4>
                    <a href="tel:+919414032355" className="text-gray-600 hover:text-green-500 transition-colors text-lg">+91 94140 32355</a>
                    <p className="text-sm text-gray-500 mt-1">Available 24/7 for urgent queries</p>
                  </div>
                </div>
                
                {/* Email */}
                <div className="flex items-start gap-6">
                  <div className="w-14 h-14 bg-green-50 rounded-xl flex items-center justify-center text-green-500 shrink-0">
                    <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                  </div>
                  <div>
                    <h4 className="text-xl font-bold text-gray-900 mb-1">Email Address</h4>
                    <a href="mailto:info@agrawalgoyanka.co.in" className="text-gray-600 hover:text-green-500 transition-colors text-lg">info@agrawalgoyanka.co.in</a>
                    <p className="text-sm text-gray-500 mt-1">We typically reply within 24 hours</p>
                  </div>
                </div>

                {/* Office */}
                <div className="flex items-start gap-6">
                  <div className="w-14 h-14 bg-green-50 rounded-xl flex items-center justify-center text-green-500 shrink-0">
                    <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                  </div>
                  <div>
                    <h4 className="text-xl font-bold text-gray-900 mb-1">Office Location</h4>
                    <p className="text-gray-600 text-lg">Agrawal Goyanka & Co. <br /> Chartered Accountants, India</p>
                  </div>
                </div>
              </div>
            </div>

            {/* Contact Form */}
            <div className="bg-gray-50 p-10 rounded-3xl border border-gray-100 shadow-xl">
              <h3 className="text-2xl font-extrabold text-gray-900 mb-6">Send Us A Message</h3>
              <form className="space-y-6">
                <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
                  <div>
                    <label className="block text-sm font-bold text-gray-700 mb-2">Your Name</label>
                    <input type="text" className="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all" placeholder="John Doe" />
                  </div>
                  <div>
                    <label className="block text-sm font-bold text-gray-700 mb-2">Your Email</label>
                    <input type="email" className="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all" placeholder="john@example.com" />
                  </div>
                </div>
                <div>
                  <label className="block text-sm font-bold text-gray-700 mb-2">Subject</label>
                  <input type="text" className="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all" placeholder="How can we help?" />
                </div>
                <div>
                  <label className="block text-sm font-bold text-gray-700 mb-2">Message</label>
                  <textarea rows={5} className="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all resize-none" placeholder="Write your message here..."></textarea>
                </div>
                <button type="button" className="w-full bg-[#0b1b3d] hover:bg-green-500 text-white font-bold py-4 rounded-xl transition-colors shadow-lg">
                  Send Message
                </button>
              </form>
            </div>
            
          </div>
        </div>
      </section>
    </main>
  );
}
