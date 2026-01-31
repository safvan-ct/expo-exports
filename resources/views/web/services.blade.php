@extends('layouts.web')

@section('title', "Services")

@section('content')
    <div class="container text-center py-5">
        <h2 class="mb-5 fw-bold">Why Choose Us</h2>
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="feature-card text-center p-4">
                    <div class="icon-box mb-3">
                        <i class="fas fa-globe-americas fa-3x"></i>
                    </div>
                    <h4>Global Reach</h4>
                    <p class="text-muted">Connecting continents with seamless logistics. We bridge the gap between
                        markets across 100+ countries.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card text-center p-4">
                    <div class="icon-box mb-3">
                        <i class="fas fa-check-circle fa-3x"></i>
                    </div>
                    <h4>Quality Assurance</h4>
                    <p class="text-muted">Rigorous inspections at every stage. We ensure your exports meet the
                        highest international standards.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card text-center p-4">
                    <div class="icon-box mb-3">
                        <i class="fas fa-shipping-fast fa-3x"></i>
                    </div>
                    <h4>On-Time Delivery</h4>
                    <p class="text-muted">Efficiency you can track. Our optimized routes guarantee your cargo
                        arrives exactly when promised.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card text-center p-4">
                    <div class="icon-box mb-3">
                        <i class="fas fa-box-open fa-3x"></i>
                    </div>
                    <h4>Secure Packing</h4>
                    <p class="text-muted">Built for the journey. We use industrial-grade materials to keep your
                        goods safe from port to port.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card text-center p-4">
                    <div class="icon-box mb-3">
                        <i class="fas fa-handshake fa-3x"></i>
                    </div>
                    <h4>Trusted Partners</h4>
                    <p class="text-muted">Collaboration you can rely on. Our network of global agents ensures smooth
                        customs and handling.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
