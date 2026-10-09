import Navbar from '@/components/Navbar';
import Link from 'next/link';

export default function AuditService() {
  return (
    <main className="min-h-screen bg-gray-50">
      <Navbar />
      
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="mb-12">
            <Link href="/#services" className="text-green-600 font-semibold hover:underline flex items-center mb-4">
              <svg className="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M15 19l-7-7 7-7"></path></svg>
              Back to Services
            </Link>
            <h1 className="text-4xl font-extrabold text-gray-900 mb-6">Audit & Assurance Services</h1>
            <p className="text-lg text-gray-600 max-w-3xl">
              Independent and objective auditing services to enhance the reliability of information prepared by clients for use by investors, creditors, and other stakeholders.
            </p>
          </div>
          
          <div className="bg-gray-50 p-8 rounded-xl border border-gray-100">
             <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                  <h3 className="text-xl font-bold text-gray-900 mb-3">Statutory Audits</h3>
                  <p className="text-gray-700">Conducting audits as mandated by the Companies Act, ensuring full compliance with accounting standards and regulatory requirements.</p>
                </div>
                <div>
                  <h3 className="text-xl font-bold text-gray-900 mb-3">Internal Audits</h3>
                  <p className="text-gray-700">Evaluating and improving the effectiveness of risk management, control, and governance processes within your organization.</p>
                </div>
                <div>
                  <h3 className="text-xl font-bold text-gray-900 mb-3">Tax Audits</h3>
                  <p className="text-gray-700">Auditing under the Income Tax Act to verify that books of accounts are properly maintained and correctly reflect taxable income.</p>
                </div>
                <div>
                  <h3 className="text-xl font-bold text-gray-900 mb-3">Specialized Audits</h3>
                  <p className="text-gray-700">Including concurrent audits, forensic audits, and stock audits for banks and financial institutions.</p>
                </div>
             </div>
          </div>
          
          <div className="mt-12 text-center">
            <Link href="/contact" className="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-full transition-colors shadow-lg">
              Schedule an Audit
            </Link>
          </div>
        </div>
      </section>
    </main>
  );
}
