@extends('layouts.app')

@section('title', 'Donate Us')

@section('styles')
    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    .logo{
      height: 70px;
  }

  .navbar {
      background-color: #fff;
      padding: 15px 0;
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
  }
  
  .navbar-brand {
      font-weight: bold;
      color: #0b5ed7;
      font-size: 18px;
  }
  
  .nav-link {
      color: #333;
      font-size: 14px;
      margin-right: 10px;
      font-weight: 600;
  }
  
  .donate-btn {
      background-color: #ffc107;
      color: #333;
      border-radius: 5px;
      padding: 5px 15px;
      font-size: 14px;
      font-weight: 600;
  }

    .hero-section {
      background-size: cover;
      background-position: center;
      padding: 250px 0 0;
      position: relative;
      margin-bottom: 0;
      color: white;
      text-align: center;
      background-image: url("{{ asset('assets/images/mr_group.jpg') }}");
    }

    .hero-section::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(27, 26, 26, 0.5);
    }

    .hero-container {
      position: relative;
      z-index: 2;
      padding: 0 15px;
      transform: translateY(-100px);
      text-align: center;
    }

    .hero-title {
      font-size: 3.5rem;
      font-weight: bold;
      margin-bottom: 20px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 5);
      line-height: 1.2;
    }

    .lead {
      margin-top: -10px;
      font-size: 1.25rem;
    }

    .donation-container {
      background-color: #f8f9fa;
      border-radius: 5px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      padding: 30px;
      margin-top: 20px;
      position: relative;
      z-index: 10;
    }

    .text-center {
      text-align: center;
      margin-top: 20px;
    }

    .bank-details {
      background-color: white;
      border-radius: 5px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    .bank-header {
      background-color: #ffc107;
      color: #212529;
      padding: 15px;
      font-weight: bold;
      text-align: center;
    }

    .bank-table {
      width: 100%;
    }

    .bank-table tr td:first-child {
      font-weight: bold;
      width: 40%;
      background-color: rgba(255, 193, 7, 0.1);
    }

    .thank-you-container {
      display: none;
      background-color: rgba(13, 110, 253, 0.1);
      border-radius: 5px;
      padding: 30px;
      margin-top: 30px;
      text-align: center;
    }

    .thank-you-container i {
      font-size: 60px;
      color: #28a745;
      margin-bottom: 20px;
    }
    
    .form-select {
      padding: 0.375rem 0.75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #212529;
      border: 1px solid #ced4da;
      border-radius: 0.25rem;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    
    .form-select:focus {
      border-color: #86b7fe;
      outline: 0;
      box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    
    .text-danger {
      color: #dc3545;
    }

    .footer-link {
            color: #ccc;
            text-decoration: none;
        }

        .footer-link:hover {
            color: #fff;
            text-decoration: underline;
        }

        .social-section{
            margin-bottom:15px;
        }
        
        .social-icons i {
            font-size: 22px;
            color: white;
            transition: color 0.3s ease;
        }

        .social-icons i:hover {
            color: #ffc107;
        }

        .social-icons .divider {
            margin: 0 7px;
            color: white;
            font-size: 20px;
        }

    @media (max-width: 768px) {
      .hero-title {
        font-size: 2.5rem;
      }

      .donation-container {
        margin-top: -30px;
        padding: 20px 15px;
      }

      .bank-details {
        margin-bottom: 20px;
      }
    }
@endsection

@section('content')
@include('layouts.navbar')

    <main>
      <!-- Hero Section -->
      <section class="hero-section">
    <div class="hero-container">
      <h1 class="hero-title">Donate Now</h1>
      <p class="lead">
        Initiatives to make this world a better place to live in
      </p>
    </div>
  </section>

  <!-- Donation Section -->
  <section class="py-5">
    <div class="container">
      <div class="donation-container">
        <div class="row">
          <!-- Bank Details Column -->
          <div class="col-md-7 mx-auto mb-4">
            <div class="bank-details mb-4">
              <div class="bank-header">
                <img src="{{ asset('assets/images/bankLogo.jpg')}}" alt="Bank Logo" width="50" height="60"/>
                THE PRATAP CO-OPERATIVE BANK LTD
              </div>
              <table class="bank-table table table-striped">
                <tr>
                  <td class="p-3">A/C Holder Name:</td>
                  <td class="p-3">Muskurate Raho</td>
                </tr>
                <tr>
                  <td class="p-3">A/C No.:</td>
                  <td class="p-3">002010000413095</td>
                </tr>
                <tr>
                  <td class="p-3">IFSC Code:</td>
                  <td class="p-3">MDCP0680265</td>
                </tr>
                <tr>
                  <td class="p-3">Address:</td>
                  <td class="p-3">
                    KANDIVALI BRANCH (2)
                  </td>
                </tr>
              </table>
            </div>
            
            <!-- Display success message if redirect with success -->
            @if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif
            
            <div id="thankYouMessage" class="thank-you-container">
              <i class="fas fa-heart"></i>
              <h3>Your Generosity Makes a Difference!</h3>
              <p class="lead">
                "Giving is not just about making a donation.
                It's about making a difference."
              </p>
              <p>
                We greatly appreciate your contribution to
                our cause.
              </p>
              <p>
                <strong>You will receive your donation receipt
                  within 7 working days.</strong>
              </p>
            </div>
            
            <div class="text-center">
              <button type="button" class="donate-btn btn btn-lg" data-bs-toggle="modal"
                data-bs-target="#donationModal">
                Donate Now
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Donation Modal -->
  <div class="modal fade" id="donationModal" tabindex="-1" aria-labelledby="donationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-light">
          <h5 class="modal-title" id="donationModalLabel">
            Make a Donation
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="donationForm" action="{{ route('donate.store') }}" method="POST">
          @csrf
            <div class="row mb-3">
              <div class="col-md-6 mb-3 mb-md-0">
                <label for="fullName" class="form-label">Full Name *</label>
                <input type="text" class="form-control" id="fullName" name="full_name" required />
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">Email Address *</label>
                <input type="email" class="form-control" id="email" name="email" required />
              </div>
            </div>
            
            <div class="row mb-3">
              <div class="col-md-6 mb-3 mb-md-0">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" />
              </div>
              <div class="col-md-6">
                <label for="location" class="form-label">Location/City *</label>
                <input type="text" class="form-control" id="location" name="location" required />
              </div>
            </div>
            
            <div class="mb-3">
              <label for="amount" class="form-label">Donation Amount (₹) *</label>
              <input type="number" class="form-control" id="amount" name="amount" min="1" required />
            </div>
            
            <div class="mb-3">
              <label for="paymentMode" class="form-label">Mode of Payment *</label>
              <select class="form-select" id="paymentMode" name="payment_mode" required>
                <option value="">Select payment mode</option>
                <option value="online">Online Transfer</option>
                <option value="cash">Cash</option>
                <option value="cheque">Cheque</option>
                <option value="other">Other</option>
              </select>
            </div>
            
            <div class="mb-3" id="transactionIdContainer">
              <label for="transactionId" class="form-label">Transaction ID/Reference Number <span class="text-danger" id="transactionRequiredMark">*</span></label>
              <input type="text" class="form-control" id="transactionId" name="transaction_id" />
              <small class="text-muted">If you've chosen online payment, please add the transaction reference</small>
            </div>
            
            <div class="mb-3">
              <label for="message" class="form-label">Message (Optional)</label>
              <textarea class="form-control" id="message" name="message" rows="3"
              placeholder="Tell us why you're supporting our cause..."></textarea>
            </div>
            
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="anonymous" name="is_anonymous" />
              <label class="form-check-label" for="anonymous">Make this donation anonymous</label>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn donate-btn" id="submitDonation">
            Submit Donation Details
          </button>
        </div>
      </div>
    </div>
  </div>
</main> 

@include('layouts.footer')
@include('layouts.donateUsScripts')
@endsection
