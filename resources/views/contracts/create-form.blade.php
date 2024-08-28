<x-app-layout
    title="Crear Contrato"
    class="overflow-y-scroll"
>
    <div class="container mx-auto">
        <header class="mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Crear Contrato</h2>
        </header>
        <x-action-form
            :model="null"
            :modelId="null"
            :$properties
            :$owners
            :$tenants
            :$guarantors
            :$currencyTypes
            action="create"
            route="contracts.processCreate"
            formType="contracts"
        />
    </div>
</x-app-layout>
