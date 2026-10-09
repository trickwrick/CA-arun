import Navbar from '@/components/Navbar';
import Link from 'next/link';

export default function Services() {
  const services = [
    { 
      title: 'Audit & Assurance', 
      desc: 'We provide the assurance services in compliance with the ethical and professional standards.', 
      icon: 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4',
      link: '/services/audit'
    },
    { 
      title: 'Taxation', 
      desc: 'Expertise in tax planning, assessment handling, and comprehensive tax compliances for businesses and individuals.', 
      icon: 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
      link: '/services/tax'
    },
    { 
      title: 'Startup Advisory', 
      desc: 'Assisting young entrepreneurs in legal compliances, funding strategies, and business structure formation.', 
      icon: 'M13 10V3L4 14h7v7l9-11h-7z',
      link: '/services/advisory'
    },
    { 
      title: 'Digital Transformation', 
      desc: 'Automating human-led processes for better efficiency, integrating modern accounting software and ERPs.', 
      icon: 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
      link: '/services/company'
    },
    { 
      title: 'Forensic Services', 
      desc: 'Dedicated team of FAFD qualified professionals to investigate financial discrepancies and frauds.', 
      icon: 'M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z',
      link: '/services/audit'
    },
    { 
      title: 'Business Support', 
      desc: 'Outsource your finance department to our experts. We handle bookkeeping, payroll, and financial reporting.', 
      icon: 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
      link: '/services/advisory'
    },
    { 
      title: 'International Tax', 
      desc: 'Navigate cross-border transactions without complexities. Transfer pricing and DTAA advisory.', 
      icon: 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
      link: '/services/tax'
    },
    { 
      title: 'Registration', 
      desc: 'Assisting companies in registration and filing with MCA, GST, MSME, and other regulatory bodies.', 
      icon: 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
      link: '/services/company'
    },
  ];

  return (
    <main className="min-h-screen bg-gray-50 font-sans selection:bg-green-500 selection:text-white pb-20">
      <Navbar />

      {/* Page Header */}
      <section className="bg-[#0b1b3d] pt-32 pb-20 text-white text-center">
        <h1 className="text-4xl md:text-5xl font-extrabold mb-4">Our Services</h1>
        <div className="flex items-center justify-center gap-2 text-sm text-gray-300 font-medium">
          <Link href="/" className="hover:text-green-400 transition-colors">Home</Link>
          <span>/</span>
          <span className="text-green-500">Services</span>
        </div>
      </section>

      {/* Services Grid */}
      <section className="py-24 bg-white relative">
        <div className="absolute top-0 right-0 w-64 h-64 bg-green-50 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
        <div className="absolute bottom-0 left-0 w-64 h-64 bg-blue-50 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
        
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
          <div className="text-center max-w-3xl mx-auto mb-16">
            <h2 className="text-green-500 font-bold tracking-widest uppercase mb-3 text-sm">Services Quality</h2>
            <h3 className="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6">Comprehensive Financial Solutions</h3>
            <p className="text-gray-600 text-lg">We provide expert guidance across a wide spectrum of financial and regulatory matters, ensuring your business remains compliant, efficient, and poised for growth.</p>
          </div>
          
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {services.map((service, idx) => (
              <div key={idx} className="bg-white p-10 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 group transform hover:-translate-y-2">
                <div className="w-16 h-16 bg-gray-50 rounded-2xl flex items-center justify-center text-[#0b1b3d] mb-6 group-hover:bg-green-500 group-hover:text-white transition-colors">
                  <svg className="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d={service.icon}></path></svg>
                </div>
                <h4 className="text-2xl font-bold text-gray-900 mb-4 group-hover:text-green-600 transition-colors">{service.title}</h4>
                <p className="text-gray-600 mb-8 leading-relaxed">{service.desc}</p>
                <Link href={service.link} className="inline-flex items-center text-sm font-bold text-[#0b1b3d] group-hover:text-green-500 transition-colors uppercase tracking-wider">
                  Read More <svg className="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </Link>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Process Section */}
      <section className="py-24 bg-gray-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex flex-col lg:flex-row items-center gap-16">
            <div className="w-full lg:w-1/2">
              <img src="https://images.unsplash.com/photo-1556761175-4b46a572b786?q=80&w=1974&auto=format&fit=crop" alt="Consultation" className="rounded-3xl shadow-xl w-full h-125 object-cover" />
            </div>
            <div className="w-full lg:w-1/2">
              <h2 className="text-green-500 font-bold tracking-widest uppercase mb-3 text-sm">Working Process</h2>
              <h3 className="text-4xl font-extrabold text-gray-900 mb-8">How We Work With You</h3>
              
              <div className="space-y-8">
                <div className="flex gap-6">
                  <div className="w-12 h-12 bg-white rounded-full flex items-center justify-center text-green-500 font-bold text-xl shadow-md shrink-0 border border-gray-100">1</div>
                  <div>
                    <h4 className="text-xl font-bold text-gray-900 mb-2">Initial Consultation</h4>
                    <p className="text-gray-600">We discuss your specific needs, assess your current financial standing, and outline potential solutions tailored to your goals.</p>
                  </div>
                </div>
                <div className="flex gap-6">
                  <div className="w-12 h-12 bg-white rounded-full flex items-center justify-center text-green-500 font-bold text-xl shadow-md shrink-0 border border-gray-100">2</div>
                  <div>
                    <h4 className="text-xl font-bold text-gray-900 mb-2">Strategy & Planning</h4>
                    <p className="text-gray-600">Our team develops a comprehensive, step-by-step strategy to address your requirements, ensuring full compliance and maximum efficiency.</p>
                  </div>
                </div>
                <div className="flex gap-6">
                  <div className="w-12 h-12 bg-white rounded-full flex items-center justify-center text-green-500 font-bold text-xl shadow-md shrink-0 border border-gray-100">3</div>
                  <div>
                    <h4 className="text-xl font-bold text-gray-900 mb-2">Execution & Support</h4>
                    <p className="text-gray-600">We execute the plan meticulously and provide ongoing 24/7 support to navigate any future challenges or regulatory changes.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  );
}
