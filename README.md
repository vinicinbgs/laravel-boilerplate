# Finance App

## Setup
```bash
cd finance-app
docker-compose up -d
docker-compose exec app php artisan migrate
```

## Enviroments
<table>
    <thead>
        <tr>
            <th>Service</th>
            <th>Port</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nginx</td>
            <td>80</td>
        </tr>
        <tr>
            <td>PHP-FPM</td>
            <td>9000</td>
        </tr>
        <tr>
            <td>MySQL</td>
            <td>3306</td>
        </tr>
    </tbody>
</table>

[![](https://mermaid.ink/img/eyJjb2RlIjoiZ3JhcGggVERcbiAgICBBW1JlcXVlc3RdIC0tPiBCKE5HSU5YKVxuICAgIEIgLS0-IEMoUEhQLUZQTSlcbiAgICBDIC0tPiBEKE15U1FMKSIsIm1lcm1haWQiOnsidGhlbWUiOiJkZWZhdWx0In0sInVwZGF0ZUVkaXRvciI6ZmFsc2UsImF1dG9TeW5jIjp0cnVlLCJ1cGRhdGVEaWFncmFtIjpmYWxzZX0)](https://mermaid-js.github.io/mermaid-live-editor/edit#eyJjb2RlIjoiZ3JhcGggVERcbiAgICBBW1JlcXVlc3RdIC0tPiBCKE5HSU5YKVxuICAgIEIgLS0-IEMoUEhQLUZQTSlcbiAgICBDIC0tPiBEKE15U1FMKSIsIm1lcm1haWQiOiJ7XG4gIFwidGhlbWVcIjogXCJkZWZhdWx0XCJcbn0iLCJ1cGRhdGVFZGl0b3IiOmZhbHNlLCJhdXRvU3luYyI6dHJ1ZSwidXBkYXRlRGlhZ3JhbSI6ZmFsc2V9)