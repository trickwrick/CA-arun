"use client";

import Navbar from '@/components/Navbar';
import Link from 'next/link';
import { motion } from 'framer-motion';

const fadeInUp = {
  hidden: { opacity: 0, y: 30 },
  visible: { opacity: 1, y: 0, transition: { duration: 0.6, ease: "easeOut" as const } }
};

const staggerContainer = {
  hidden: { opacity: 0 },
  visible: {
    opacity: 1,
    transition: {
      staggerChildren: 0.2
    }
  }
};

export default function Home() {
  return (
    <main className="min-h-screen bg-gray-50 font-sans selection:bg-green-500 selection:text-white overflow-hidden">
      <Navbar />
      
      {/* Hero Section */}
      <section className="relative bg-[#0b1b3d] text-white pt-32 pb-40 overflow-hidden">
        <div className="absolute inset-0 z-0">
          <div className="absolute inset-0 bg-[#0b1b3d] opacity-80 z-10"></div>
          <motion.img 
            initial={{ scale: 1.1, opacity: 0 }}
            animate={{ scale: 1, opacity: 1 }}
            transition={{ duration: 1.5 }}
            src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=2072&auto=format&fit=crop" 
            alt="Finance background" 
            className="w-full h-full object-cover" 
          />
        </div>
        
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
          <motion.div 
            className="max-w-3xl"
            initial="hidden"
            animate="visible"
            variants={staggerContainer}
          >
            <motion.span variants={fadeInUp} className="inline-block py-1 px-3 rounded-full bg-green-500/20 text-green-400 font-semibold tracking-wider text-sm mb-6 border border-green-500/30">
              Your Trusted Partner in Chartered Accountancy Solutions
            </motion.span>
            <motion.h1 variants={fadeInUp} className="text-5xl md:text-7xl font-extrabold leading-tight mb-6">
              Transforming <span className="text-transparent bg-clip-text bg-linear-to-r from-green-400 to-emerald-600">Numbers</span> into Success
            </motion.h1>
            <motion.p variants={fadeInUp} className="text-xl text-gray-300 mb-10 leading-relaxed max-w-2xl">
              We have provided financial planning and investment services to individuals and institutions in a variety of settings. Unlock your growth potential with our expert financial guidance.
            </motion.p>
            <motion.div variants={fadeInUp} className="flex flex-col sm:flex-row gap-4">
              <Link href="/contact" className="bg-linear-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white px-8 py-4 rounded-full font-bold text-lg transition-all transform hover:-translate-y-1 shadow-lg shadow-green-500/30 flex items-center justify-center">
                Contact Us Today
                <svg className="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
              </Link>
              <Link href="/services" className="bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white hover:text-[#0b1b3d] text-white px-8 py-4 rounded-full font-bold text-lg transition-all flex items-center justify-center">
                Explore Services
              </Link>
            </motion.div>
          </motion.div>
        </div>
        
        {/* Abstract shapes for aesthetics */}
        <motion.div 
          animate={{ scale: [1, 1.2, 1], rotate: [0, 90, 0] }}
          transition={{ duration: 20, repeat: Infinity, ease: "linear" }}
          className="absolute top-1/4 right-0 w-96 h-96 bg-green-500 rounded-full mix-blend-multiply filter blur-[128px] opacity-20"
        />
        <motion.div 
          animate={{ scale: [1, 1.3, 1], rotate: [0, -90, 0] }}
          transition={{ duration: 25, repeat: Infinity, ease: "linear" }}
          className="absolute bottom-1/4 left-1/4 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-[128px] opacity-20"
        />
      </section>

      {/* Features Section - Overlapping Hero */}
      <section className="relative z-30 -mt-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <motion.div 
          className="grid grid-cols-1 md:grid-cols-3 gap-6"
          initial="hidden"
          whileInView="visible"
          viewport={{ once: true, margin: "-100px" }}
          variants={staggerContainer}
        >
          <motion.div variants={fadeInUp} className="bg-white rounded-2xl p-8 shadow-xl border border-gray-100 transform hover:-translate-y-2 transition-all duration-300 group">
            <div className="w-14 h-14 bg-green-50 rounded-xl flex items-center justify-center text-green-600 mb-6 group-hover:scale-110 transition-transform">
              <svg className="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 className="text-xl font-bold text-gray-900 mb-3">Available 24/7</h3>
            <p className="text-gray-600 leading-relaxed">We are pleased to take up queries at any hour of the day. Support when you need it most.</p>
          </motion.div>
          <motion.div variants={fadeInUp} className="bg-[#0b1b3d] rounded-2xl p-8 shadow-xl transform hover:-translate-y-2 transition-all duration-300 group">
            <div className="w-14 h-14 bg-white/10 rounded-xl flex items-center justify-center text-green-400 mb-6 group-hover:scale-110 transition-transform">
              <svg className="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
            <h3 className="text-xl font-bold text-white mb-3">Early Response</h3>
            <p className="text-gray-300 leading-relaxed">We come up with professional suggestions at the earliest. Time is money, and we save both.</p>
          </motion.div>
          <motion.div variants={fadeInUp} className="bg-white rounded-2xl p-8 shadow-xl border border-gray-100 transform hover:-translate-y-2 transition-all duration-300 group">
            <div className="w-14 h-14 bg-green-50 rounded-xl flex items-center justify-center text-green-600 mb-6 group-hover:scale-110 transition-transform">
              <svg className="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            <h3 className="text-xl font-bold text-gray-900 mb-3">Professional Support</h3>
            <p className="text-gray-600 leading-relaxed">Qualified professionals personally deal with individual queries ensuring top-tier service quality.</p>
          </motion.div>
        </motion.div>
      </section>

      {/* About Section */}
      <section className="py-24 bg-white overflow-hidden">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex flex-col lg:flex-row items-center gap-16">
            <motion.div 
              className="w-full lg:w-1/2 relative"
              initial={{ opacity: 0, x: -50 }}
              whileInView={{ opacity: 1, x: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.8 }}
            >
              <div className="relative rounded-3xl overflow-hidden shadow-2xl aspect-4/3">
                <motion.img 
                  whileHover={{ scale: 1.05 }}
                  transition={{ duration: 0.5 }}
                  src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=2071&auto=format&fit=crop" 
                  alt="Team meeting" 
                  className="w-full h-full object-cover" 
                />
                <div className="absolute inset-0 bg-linear-to-tr from-[#0b1b3d]/60 to-transparent"></div>
              </div>
              <motion.div 
                initial={{ opacity: 0, y: 20 }}
                whileInView={{ opacity: 1, y: 0 }}
                transition={{ delay: 0.4 }}
                className="absolute -bottom-8 -right-8 bg-white p-6 rounded-2xl shadow-xl flex items-center gap-4"
              >
                <div className="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                  <span className="text-2xl font-black">31</span>
                </div>
                <div>
                  <p className="text-gray-500 text-sm font-bold uppercase tracking-wider">Years of</p>
                  <p className="text-gray-900 text-xl font-bold">Experience</p>
                </div>
              </motion.div>
            </motion.div>
            <motion.div 
              className="w-full lg:w-1/2 mt-12 lg:mt-0"
              initial="hidden"
              whileInView="visible"
              viewport={{ once: true }}
              variants={staggerContainer}
            >
              <motion.h2 variants={fadeInUp} className="text-green-500 font-bold tracking-widest uppercase mb-3 text-sm">About Us</motion.h2>
              <motion.h3 variants={fadeInUp} className="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">Agrawal Goyanka & Co</motion.h3>
              <motion.p variants={fadeInUp} className="text-lg text-gray-600 mb-8 leading-relaxed">
                Agrawal Goyanka & Co. is a trusted Chartered Accountancy firm offering expert services in auditing, taxation, financial consulting, and business advisory. We provide tailored solutions to individuals and businesses, ensuring compliance, strategic growth, and financial stability with a focus on integrity, professionalism, and long-term client relationships.
              </motion.p>
              
              <motion.div variants={fadeInUp} className="flex items-center gap-6 p-6 bg-gray-50 rounded-2xl border border-gray-100 mb-8">
                <div className="w-14 h-14 bg-green-500 rounded-full flex items-center justify-center text-white shrink-0">
                  <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                </div>
                <div>
                  <p className="text-gray-500 text-sm mb-1">Call us 24/7 for any questions</p>
                  <a href="tel:+919414032355" className="text-2xl font-bold text-gray-900 hover:text-green-500 transition-colors">+91 94140 32355</a>
                </div>
              </motion.div>
              
              <motion.div variants={fadeInUp}>
                <Link href="/about" className="inline-flex items-center text-[#0b1b3d] font-bold hover:text-green-600 transition-colors group">
                  Discover More About Us
                  <span className="w-10 h-10 ml-4 rounded-full bg-gray-100 flex items-center justify-center group-hover:bg-green-50 group-hover:text-green-600 transition-colors">
                    <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 5l7 7-7 7"></path></svg>
                  </span>
                </Link>
              </motion.div>
            </motion.div>
          </div>
        </div>
      </section>

      {/* Services Section */}
      <section className="py-24 bg-gray-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <motion.div 
            initial="hidden"
            whileInView="visible"
            viewport={{ once: true }}
            variants={staggerContainer}
            className="text-center max-w-3xl mx-auto mb-16"
          >
            <motion.h2 variants={fadeInUp} className="text-green-500 font-bold tracking-widest uppercase mb-3 text-sm">Services Quality</motion.h2>
            <motion.h3 variants={fadeInUp} className="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6">What We Offer For You</motion.h3>
          </motion.div>
          
          <motion.div 
            initial="hidden"
            whileInView="visible"
            viewport={{ once: true }}
            variants={staggerContainer}
            className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6"
          >
            {[
              { title: 'Audit & Assurance', desc: 'Compliance with the ethical and professional standards.', icon: 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4', link: '/services/audit' },
              { title: 'Taxation', desc: 'Tax planning, assessment handling and tax compliances.', icon: 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', link: '/services/tax' },
              { title: 'Startup Advisory', desc: 'Assisting young entrepreneurs in legal compliances.', icon: 'M13 10V3L4 14h7v7l9-11h-7z', link: '/services/advisory' },
              { title: 'Digital Transformation', desc: 'Automating human-led processes for better efficiency.', icon: 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', link: '/services/company' },
              { title: 'Forensic Services', desc: 'Dedicated team of FAFD qualified professionals.', icon: 'M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z', link: '/services/audit' },
              { title: 'Business Support', desc: 'Outsource your finance department to our experts.', icon: 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', link: '/services/advisory' },
              { title: 'International Tax', desc: 'Cross border transactions without complexities.', icon: 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z', link: '/services/tax' },
              { title: 'Registration', desc: 'Assisting companies in registration and filing.', icon: 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', link: '/services/company' },
            ].map((service, idx) => (
              <motion.div variants={fadeInUp} key={idx} className="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group">
                <div className="w-14 h-14 bg-gray-50 rounded-xl flex items-center justify-center text-[#0b1b3d] mb-6 group-hover:bg-green-500 group-hover:text-white transition-colors">
                  <svg className="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d={service.icon}></path></svg>
                </div>
                <h4 className="text-xl font-bold text-gray-900 mb-3 group-hover:text-green-600 transition-colors">{service.title}</h4>
                <p className="text-gray-600 mb-6 text-sm leading-relaxed">{service.desc}</p>
                <Link href={service.link} className="inline-flex items-center text-sm font-bold text-gray-900 hover:text-green-500 transition-colors uppercase tracking-wider">
                  Details <svg className="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 5l7 7-7 7"></path></svg>
                </Link>
              </motion.div>
            ))}
          </motion.div>
        </div>
      </section>

      {/* Team Section */}
      <section className="py-24 bg-[#0b1b3d] text-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <motion.div 
            initial="hidden"
            whileInView="visible"
            viewport={{ once: true }}
            variants={staggerContainer}
            className="text-center max-w-3xl mx-auto mb-16"
          >
            <motion.h2 variants={fadeInUp} className="text-green-400 font-bold tracking-widest uppercase mb-3 text-sm">Our Team</motion.h2>
            <motion.h3 variants={fadeInUp} className="text-4xl md:text-5xl font-extrabold text-white mb-6">Meet Our Leadership</motion.h3>
          </motion.div>
          
          <motion.div 
            initial="hidden"
            whileInView="visible"
            viewport={{ once: true }}
            variants={staggerContainer}
            className="grid grid-cols-1 md:grid-cols-3 gap-8"
          >
            {[
              { name: 'CA Arun Kumar Agarwal', role: 'Founder', img: 'https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=2000&auto=format&fit=crop' },
              { name: 'CA Nitesh Goyanka', role: 'Partner', img: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=2000&auto=format&fit=crop' },
              { name: 'CA Amit Gupta', role: 'Partner', img: 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?q=80&w=2000&auto=format&fit=crop' }
            ].map((member, idx) => (
              <motion.div variants={fadeInUp} key={idx} className="group relative rounded-2xl overflow-hidden aspect-3/4 shadow-2xl">
                <img src={member.img} alt={member.name} className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                <div className="absolute inset-0 bg-linear-to-t from-black/90 via-black/20 to-transparent flex flex-col justify-end p-8 transform translate-y-4 group-hover:translate-y-0 transition-transform">
                  <p className="text-green-400 font-bold text-sm tracking-wider uppercase mb-1">{member.role}</p>
                  <h4 className="text-2xl font-bold text-white">{member.name}</h4>
                  <div className="flex gap-3 mt-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                    <a href="#" className="w-8 h-8 rounded-full bg-white/20 hover:bg-green-500 flex items-center justify-center backdrop-blur-sm transition-colors">
                      <svg className="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                  </div>
                </div>
              </motion.div>
            ))}
          </motion.div>
        </div>
      </section>

      {/* CTA / FAQ Section */}
      <section className="py-24 bg-white overflow-hidden">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex flex-col lg:flex-row gap-16">
            <motion.div 
              className="w-full lg:w-1/2"
              initial="hidden"
              whileInView="visible"
              viewport={{ once: true }}
              variants={staggerContainer}
            >
              <motion.h2 variants={fadeInUp} className="text-green-500 font-bold tracking-widest uppercase mb-3 text-sm">FAQ</motion.h2>
              <motion.h3 variants={fadeInUp} className="text-4xl font-extrabold text-gray-900 mb-8">Some Questions & Answers</motion.h3>
              
              <div className="space-y-4">
                {[
                  { q: 'Do I need a CA to file my ITR?', a: 'Any legally registered business entity, such as a sole proprietorship, partnership, LLC, or corporation, can greatly benefit from a CA.' },
                  { q: 'How much does a chartered accountant charge for tax filing?', a: 'Separating your personal and business finances is crucial. Costs vary based on complexity, simplifying accounting and tax reporting.' },
                  { q: 'Can CA help to save taxes?', a: 'Yes, a CA helps you navigate tax laws to maximize your savings legally through proper tax planning.' }
                ].map((faq, idx) => (
                  <motion.div variants={fadeInUp} key={idx} className="border border-gray-100 rounded-2xl p-6 bg-gray-50 hover:bg-white hover:shadow-md transition-all group">
                    <h4 className="text-lg font-bold text-gray-900 mb-3 flex items-start gap-4">
                      <span className="text-green-500 font-black text-xl">Q.</span> {faq.q}
                    </h4>
                    <p className="text-gray-600 pl-9">{faq.a}</p>
                  </motion.div>
                ))}
              </div>
            </motion.div>
            
            <motion.div 
              className="w-full lg:w-1/2"
              initial={{ opacity: 0, scale: 0.9 }}
              whileInView={{ opacity: 1, scale: 1 }}
              viewport={{ once: true }}
              transition={{ duration: 0.6 }}
            >
              <div className="bg-gray-50 p-10 rounded-3xl border border-gray-100 h-full flex flex-col justify-center items-center text-center">
                <div className="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center text-green-600 mb-8">
                  <svg className="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg>
                </div>
                <h3 className="text-3xl font-extrabold text-gray-900 mb-4">You can make a request to join our team</h3>
                <p className="text-gray-600 mb-10 max-w-sm">We are always looking for talented professionals to join our growing firm.</p>
                <div className="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                  <Link href="/appointment" className="bg-[#0b1b3d] hover:bg-gray-900 text-white px-8 py-4 rounded-full font-bold transition-all text-center hover:scale-105">
                    Get An Appointment
                  </Link>
                  <Link href="/contact" className="bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-full font-bold transition-all text-center shadow-lg shadow-green-500/30 hover:scale-105">
                    Apply For Job
                  </Link>
                </div>
              </div>
            </motion.div>
          </div>
        </div>
      </section>
    </main>
  );
}
