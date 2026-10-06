#!/usr/bin/env bash
set -e

echo "==> 🧑‍💻 내 포트폴리오 (포트 8000) 외부 접속 터널을 준비합니다..."

# Check if cloudflared exists, if not download it automatically
if ! command -v cloudflared &> /dev/null && [ ! -f ./cloudflared ]; then
    echo "==> cloudflared 다운로드 중 (약 5초)..."
    curl -L -o ./cloudflared https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-linux-amd64
    chmod +x ./cloudflared
fi

CMD="./cloudflared"
if command -v cloudflared &> /dev/null; then
    CMD="cloudflared"
fi

echo "==> 🚀 터널을 가동합니다! 잠시 후 화면에 외부 접속 주소가 나타납니다..."
echo "==> (터널을 종료하려면 Ctrl + C 를 누르시면 됩니다)"
echo ""

$CMD tunnel --url http://localhost:8000
