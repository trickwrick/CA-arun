import Navbar from '@/components/Navbar';
import Link from 'next/link';

export default function TaxService() {
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
            <h1 className="text-4xl font-extrabold text-gray-900 mb-6">Income Tax & GST Services</h1>
            <p className="text-lg text-gray-600 max-w-3xl">
              Comprehensive taxation services tailored to your business needs. We handle compliance, planning, and representation so you can focus on growth.
            </p>
          </div>
          
          <div className="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div className="bg-gray-50 p-8 rounded-xl border border-gray-100">
              <h2 className="text-2xl font-bold text-gray-900 mb-4">Direct Taxation (Income Tax)</h2>
              <ul className="space-y-3 text-gray-700">
                <li>✅ Corporate Tax Planning & Returns</li>
                <li>✅ Individual & HNI Tax Filing</li>
                <li>✅ Tax Audits (Section 44AB)</li>
                <li>✅ Transfer Pricing Studies</li>
                <li>✅ Representation before Tax Authorities</li>
              </ul>
            </div>
            
            <div className="bg-gray-50 p-8 rounded-xl border border-gray-100">
              <h2 className="text-2xl font-bold text-gray-900 mb-4">Indirect Taxation (GST)</h2>
              <ul className="space-y-3 text-gray-700">
                <li>✅ GST Registration & Migration</li>
                <li>✅ Filing of Monthly/Quarterly GST Returns</li>
                <li>✅ GST Annual Return & Reconciliation</li>
                <li>✅ Advisory on Complex GST Matters</li>
                <li>✅ Handling GST Notices and Assessments</li>
              </ul>
            </div>
          </div>
          
          <div className="mt-12 text-center">
            <Link href="/contact" className="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-full transition-colors shadow-lg">
              Consult a Tax Expert
            </Link>
          </div>
        </div>
      </section>
    </main>
  );
}
