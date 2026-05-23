<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .header {
            text-align: center;
            color: white;
            margin-bottom: 50px;
            animation: fadeInDown 0.6s ease-out;
        }
        
        .header h1 {
            font-size: 3.5em;
            margin-bottom: 10px;
            font-weight: 800;
            text-shadow: 0 4px 6px rgba(0,0,0,0.1);
            letter-spacing: -1px;
        }
        
        .header p {
            font-size: 1.2em;
            opacity: 0.95;
            font-weight: 300;
        }
        
        .alerts {
            margin-bottom: 30px;
        }
        
        .alert {
            padding: 18px 25px;
            margin-bottom: 15px;
            border-radius: 12px;
            background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%);
            color: white;
            border: none;
            box-shadow: 0 4px 15px rgba(20, 184, 166, 0.3);
            animation: slideInDown 0.4s ease-out;
        }
        
        .form-card {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
            margin-bottom: 40px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(249, 115, 22, 0.2);
            animation: fadeInUp 0.6s ease-out 0.1s backwards;
        }
        
        .form-card h3 {
            color: #f1f5f9;
            font-size: 1.8em;
            margin-bottom: 30px;
            font-weight: 700;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #f1f5f9;
            font-size: 0.95em;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        input, textarea, select {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #334155;
            border-radius: 12px;
            font-size: 1em;
            transition: all 0.3s ease;
            background-color: #0f172a;
            color: #f1f5f9;
            font-family: inherit;
        }
        
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #f97316;
            background-color: #1e293b;
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
        }
        
        textarea {
            resize: vertical;
            min-height: 120px;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 25px;
        }
        
        .btn {
            padding: 14px 35px;
            border: none;
            border-radius: 12px;
            font-size: 1em;
            cursor: pointer;
            font-weight: 700;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(249, 115, 22, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(249, 115, 22, 0.4);
        }
        
        .btn-primary:active {
            transform: translateY(-1px);
        }
        
        .btn-success {
            background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%);
            color: white;
            padding: 10px 18px;
            font-size: 0.85em;
            box-shadow: 0 2px 8px rgba(20, 184, 166, 0.2);
        }
        
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(20, 184, 166, 0.3);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #e11d48 0%, #be185d 100%);
            color: white;
            padding: 10px 18px;
            font-size: 0.85em;
            box-shadow: 0 2px 8px rgba(225, 29, 72, 0.2);
        }
        
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(225, 29, 72, 0.3);
        }
        
        .tasks-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .tasks-column {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
            border: 1px solid rgba(249, 115, 22, 0.2);
            animation: fadeInUp 0.6s ease-out 0.2s backwards;
        }
        
        .tasks-column h2 {
            margin-bottom: 30px;
            color: #f1f5f9;
            font-size: 1.6em;
            font-weight: 700;
            border-bottom: 3px solid #f97316;
            padding-bottom: 15px;
        }
        
        .task-item {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            padding: 20px;
            margin-bottom: 18px;
            border-radius: 12px;
            border-left: 5px solid #f97316;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .task-item::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(249, 115, 22, 0.05) 0%, transparent 100%);
            pointer-events: none;
        }
        
        .task-item.completed {
            opacity: 0.85;
            border-left-color: #14b8a6;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }
        
        .task-item:hover {
            transform: translateX(8px);
            box-shadow: 0 8px 20px rgba(249, 115, 22, 0.15);
        }
        
        .task-title {
            font-weight: 700;
            color: #f1f5f9;
            font-size: 1.15em;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }
        
        .task-item.completed .task-title {
            text-decoration: line-through;
            color: #94a3b8;
        }
        
        .task-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            font-size: 0.9em;
            color: #cbd5e1;
            margin-bottom: 12px;
            position: relative;
            z-index: 1;
        }
        
        .task-category {
            display: inline-block;
            background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%);
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.8em;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }
        
        .task-due-date {
            display: inline-block;
            font-weight: 500;
        }
        
        .task-overdue {
            color: #ff6b6b;
            font-weight: 700;
        }
        
        .task-description {
            color: #cbd5e1;
            margin-bottom: 12px;
            font-size: 0.95em;
            line-height: 1.5;
            position: relative;
            z-index: 1;
        }
        
        .task-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            position: relative;
            z-index: 1;
        }
        
        .task-actions form {
            display: inline;
        }
        
        .empty-state {
            text-align: center;
            color: #9ca3af;
            padding: 60px 20px;
        }
        
        .empty-state p {
            font-size: 1.2em;
            font-weight: 500;
        }
        
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @media (max-width: 768px) {
            .tasks-section {
                grid-template-columns: 1fr;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .header h1 {
                font-size: 2.2em;
            }
            
            .form-card {
                padding: 25px;
            }
            
            .tasks-column {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📋 Task Management System</h1>
            <p>Stay organized and track your daily objectives</p>
        </div>
        
        <!-- Success Messages -->
        @if ($message = Session::get('success'))
            <div class="alerts">
                <div class="alert">{{ $message }}</div>
            </div>
        @endif
        
        <!-- Create Task Form -->
        <div class="form-card">
            <h3 style="margin-bottom: 20px; color: #f1f5f9;">Create New Task</h3>
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="title">Task Title *</label>
                        <input type="text" id="title" name="title" required placeholder="Enter task title">
                        @error('title')
                            <span style="color: #dc3545; font-size: 0.9em;">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="category_id">Category *</label>
                        <select id="category_id" name="category_id" required>
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span style="color: #dc3545; font-size: 0.9em;">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="due_date">Due Date *</label>
                        <input type="date" id="due_date" name="due_date" required>
                        @error('due_date')
                            <span style="color: #dc3545; font-size: 0.9em;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Enter task description (optional)"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Create Task</button>
            </form>
        </div>
        
        <!-- Tasks Workspace -->
        <div class="tasks-section">
            <!-- Pending Tasks -->
            <div class="tasks-column">
                <h2>⏳ Pending Tasks ({{ $pendingTasks->count() }})</h2>
                
                @if($pendingTasks->count() > 0)
                    @foreach($pendingTasks as $task)
                        <div class="task-item">
                            <div class="task-title">{{ $task->title }}</div>
                            
                            @if($task->description)
                                <div class="task-description">{{ $task->description }}</div>
                            @endif
                            
                            <div class="task-meta">
                                <span class="task-category">{{ $task->category->name }}</span>
                                <span class="task-due-date @if(\Carbon\Carbon::parse($task->due_date)->isPast()) task-overdue @endif">
                                    📅 {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}
                                    @if(\Carbon\Carbon::parse($task->due_date)->isPast())
                                        <strong>(OVERDUE)</strong>
                                    @endif
                                </span>
                            </div>
                            
                            <div class="task-actions">
                                <form action="{{ route('tasks.toggle', $task->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">✓ Mark Complete</button>
                                </form>
                                
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete this task?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">🗑️ Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="empty-state">
                        <p>🎉 No pending tasks! Great job!</p>
                    </div>
                @endif
            </div>
            
            <!-- Completed Tasks -->
            <div class="tasks-column">
                <h2>✅ Completed Tasks ({{ $completedTasks->count() }})</h2>
                
                @if($completedTasks->count() > 0)
                    @foreach($completedTasks as $task)
                        <div class="task-item completed">
                            <div class="task-title">{{ $task->title }}</div>
                            
                            @if($task->description)
                                <div class="task-description">{{ $task->description }}</div>
                            @endif
                            
                            <div class="task-meta">
                                <span class="task-category">{{ $task->category->name }}</span>
                                <span class="task-due-date">📅 {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}</span>
                            </div>
                            
                            <div class="task-actions">
                                <form action="{{ route('tasks.toggle', $task->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">↩️ Mark Pending</button>
                                </form>
                                
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete this task?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">🗑️ Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="empty-state">
                        <p>No completed tasks yet. Complete a task to see it here!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- 
    ✅Adobong pato recipe, pa1/pato, aromatics, siling labuyo, vinegar, soy sauce, garlic, bay leaves, paminta, and a pinch of salt. Simmer until tender and serve with gin. 
    -->
</body>
</html>
